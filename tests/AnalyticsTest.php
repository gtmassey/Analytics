<?php

namespace Gtmassey\LaravelAnalytics\Tests;

use Carbon\CarbonImmutable;
use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\MetricAggregation;
use Google\Analytics\Data\V1beta\RunReportResponse;
use Google\ApiCore\ApiException;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\LaravelAnalytics\Exceptions\InvalidPropertyIdException;
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Request\RequestData;
use Gtmassey\LaravelAnalytics\Response\DimensionHeader;
use Gtmassey\LaravelAnalytics\Response\MetricHeader;
use Gtmassey\LaravelAnalytics\Response\PropertyQuota;
use Gtmassey\LaravelAnalytics\Response\ResponseData;
use Gtmassey\LaravelAnalytics\Response\Row;
use Gtmassey\LaravelAnalytics\Response\Total;
use Gtmassey\LaravelAnalytics\Tests\Helpers\CustomDimensions;
use Gtmassey\LaravelAnalytics\Tests\Helpers\CustomMetrics;
use Gtmassey\Period\Period;
use Mockery;
use Mockery\MockInterface;
use ReflectionProperty;

class AnalyticsTest extends TestCase
{
    public function test_default_constructor(): void
    {
        $this->assertInstanceOf(Analytics::class, new Analytics);
    }

    public function test_constructor_with_propertyid(): void
    {
        config()->set('analytics.property_id', 'def');
        $newPropertyId = 'abc';
        $analytics = new Analytics($newPropertyId);
        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $this->assertEquals($newPropertyId, $requestData->propertyId);
    }

    public function test_property_string_is_empty_exception(): void
    {
        config()->offsetUnset('analytics.property_id');

        $this->expectException(InvalidPropertyIdException::class);
        $this->expectExceptionMessage(InvalidPropertyIdException::MESSAGE_INVALID_PROPERTY_ID);

        Analytics::query();
    }

    public function test_property_string_is_not_string_exception(): void
    {
        config()->set('analytics.property_id', 1234);

        $this->expectException(InvalidPropertyIdException::class);
        $this->expectExceptionMessage(InvalidPropertyIdException::MESSAGE_INVALID_PROPERTY_ID);

        Analytics::query();
    }

    public function test_set_metrics(): void
    {
        $analytics = Analytics::query()
            ->setMetrics(fn (Metrics $metrics) => $metrics
                ->sessions()
                ->bounceRate()
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);
        $requestMetrics = $requestData->metrics->map(fn (Metric $metric) => $metric->getName())->toArray();

        $this->assertEquals(['sessions', 'bounceRate'], $requestMetrics);
    }

    public function test_custom_metrics(): void
    {
        app()->bind(Metrics::class, CustomMetrics::class);

        $analytics = Analytics::query()
            ->setMetrics(fn (CustomMetrics $metrics) => $metrics
                ->customMetric()
                ->sessions()
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);
        $requestMetrics = $requestData->metrics->map(fn (Metric $metric) => $metric->getName())->toArray();

        $this->assertEquals(['customMetric', 'sessions'], $requestMetrics);
    }

    public function test_set_dimensions(): void
    {
        $analytics = Analytics::query()
            ->setDimensions(fn (Dimensions $dimensions) => $dimensions
                ->browser()
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);
        $requestDimensions = $requestData->dimensions->map(fn (Dimension $dimension) => $dimension->getName())->toArray();

        $this->assertEquals(['browser'], $requestDimensions);
    }

    public function test_custom_dimensions(): void
    {
        app()->bind(Dimensions::class, CustomDimensions::class);

        $analytics = Analytics::query()
            ->setDimensions(fn (CustomDimensions $dimensions) => $dimensions
                ->customDimension()
                ->browser()
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);
        $requestDimensions = $requestData->dimensions->map(fn (Dimension $dimension) => $dimension->getName())->toArray();

        $this->assertEquals(['customDimension', 'browser'], $requestDimensions);
    }

    public function test_limit(): void
    {
        $analytics = Analytics::query()
            ->limit(5);

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $this->assertEquals(5, $requestData->limit);

        $analytics->limit();

        $this->assertEquals(10_000, $requestData->limit);
    }

    public function test_offset(): void
    {
        $analytics = Analytics::query()
            ->offset(5);

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $this->assertEquals(5, $requestData->offset);

        $analytics->offset();

        $this->assertEquals(0, $requestData->offset);
    }

    public function test_for_period(): void
    {
        CarbonImmutable::setTestNow(CarbonImmutable::parse('2022-10-10'));

        $analytics = Analytics::query()
            ->forPeriod(Period::lastWeek()
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);
        $requestDateRange = $requestData->dateRanges->first();

        if ($requestDateRange === null) {
            $this->fail('Request date range is null');
        }

        $this->assertEquals('2022-10-03', $requestDateRange->getStartDate());
        $this->assertEquals('2022-10-09', $requestDateRange->getEndDate());
    }

    public function test_with_totals(): void
    {
        $analytics = Analytics::query()
            ->withTotals();

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $this->assertTrue($requestData->useTotals);

        $analytics->withTotals(false);

        $this->assertFalse($requestData->useTotals);
    }

    /**
     * @throws ApiException
     */
    public function test_run(): void
    {
        CarbonImmutable::setTestNow(CarbonImmutable::parse('2022-10-10'));

        $responseMock = $this->mock(RunReportResponse::class, function (MockInterface $mock) {
            $mock->shouldReceive('serializeToJsonString')
                ->once()
                ->andReturn(json_encode([
                    'dimensionHeaders' => [
                        [
                            'name' => 'browser',
                        ],
                    ],
                    'metricHeaders' => [
                        [
                            'name' => 'sessions',
                            'type' => 'TYPE_INTEGER',
                        ],
                        [
                            'name' => 'bounceRate',
                            'type' => 'TYPE_DOUBLE',
                        ],
                    ],
                    'rows' => [
                        [
                            'dimensionValues' => [

                                [
                                    'value' => 'Browser1',
                                ],
                            ],
                            'metricValues' => [
                                [
                                    'value' => 123,
                                ],
                                [
                                    'value' => 0.123,
                                ],
                            ],
                        ],
                        [
                            'dimensionValues' => [

                                [
                                    'value' => 'Browser2',
                                ],
                            ],
                            'metricValues' => [
                                [
                                    'value' => 456,
                                ],
                                [
                                    'value' => 0.456,
                                ],
                            ],
                        ],
                    ],
                    'totals' => [
                        [
                            'dimensionValues' => [
                                [
                                    'value' => 'RESERVED_TOTAL',
                                ],
                            ],
                            'metricValues' => [
                                [
                                    'value' => 579,
                                ],
                                [
                                    'value' => 0.579,
                                ],
                            ],
                        ],
                    ],
                    'rowCount' => 2,
                    'metadata' => [
                        'currencyCode' => 'USD',
                        'timeZone' => 'UTC',
                    ],
                    'propertyQuota' => [
                        'tokensPerDay' => [
                            'consumed' => 9,
                            'remaining' => 24821,
                        ],
                        'tokensPerHour' => [
                            'consumed' => 9,
                            'remaining' => 4981,
                        ],
                        'concurrentRequests' => [
                            'remaining' => 10,
                        ],
                        'serverErrorsPerProjectPerHour' => [
                            'remaining' => 10,
                        ],
                        'potentiallyThresholdedRequestsPerHour' => [
                            'remaining' => 120,
                        ],
                        'tokensPerProjectPerHour' => [
                            'consumed' => 9,
                            'remaining' => 1231,
                        ],
                    ],
                    'kind' => 'analyticsData#runReport',
                ]));
        });

        $this->mock(BetaAnalyticsDataClient::class, function (MockInterface $mock) use ($responseMock) {
            $mock->shouldReceive('runReport')
                ->with(Mockery::on(function (array $reportRequest) {
                    /** @var array{property: string, dateRanges: DateRange[], dimensions: Dimension[], metrics: Metric[], returnPropertyQuota: bool, metricAggregations: int[]} $reportRequest */
                    $this->assertEquals('properties/test123', $reportRequest['property']);

                    $this->assertCount(1, $reportRequest['dateRanges']);
                    $this->assertEquals('2022-10-03', $reportRequest['dateRanges'][0]->getStartDate());
                    $this->assertEquals('2022-10-09', $reportRequest['dateRanges'][0]->getEndDate());

                    $this->assertCount(2, $reportRequest['metrics']);
                    $this->assertEquals('sessions', $reportRequest['metrics'][0]->getName());
                    $this->assertEquals('bounceRate', $reportRequest['metrics'][1]->getName());

                    $this->assertCount(1, $reportRequest['dimensions']);
                    $this->assertEquals('browser', $reportRequest['dimensions'][0]->getName());

                    $this->assertTrue($reportRequest['returnPropertyQuota']);

                    $this->assertCount(1, $reportRequest['metricAggregations']);
                    $this->assertEquals(MetricAggregation::TOTAL, $reportRequest['metricAggregations'][0]);

                    return true;
                }))
                ->once()
                ->andReturn($responseMock);
        });

        $response = Analytics::query()
            ->setMetrics(fn (Metrics $metrics) => $metrics
                ->sessions()
                ->bounceRate()
            )
            ->setDimensions(fn (Dimensions $dimensions) => $dimensions
                ->browser()
            )
            ->forPeriod(Period::lastWeek())
            ->withTotals()
            ->run();

        $this->assertInstanceOf(ResponseData::class, $response);

        $response->dimensionHeaders?->each(function (DimensionHeader $dimensionHeader) {
            $this->assertInstanceOf(DimensionHeader::class, $dimensionHeader);
            $this->assertEquals('browser', $dimensionHeader->name);
        });

        $this->assertInstanceOf(MetricHeader::class, ($metricHeader = $response->metricHeaders->items()[0]));
        $this->assertEquals('sessions', $metricHeader->name);
        $this->assertEquals('TYPE_INTEGER', $metricHeader->type);

        $this->assertInstanceOf(MetricHeader::class, ($metricHeader = $response->metricHeaders->items()[1]));
        $this->assertEquals('bounceRate', $metricHeader->name);
        $this->assertEquals('TYPE_DOUBLE', $metricHeader->type);

        $this->assertEquals(2, $response->rowCount);
        $this->assertCount(2, $response->rows);

        $this->assertInstanceOf(Row::class, ($row = $response->rows->items()[0]));
        $this->assertEquals(1, $row->dimensionValues?->count());
        $this->assertEquals('Browser1', $row->dimensionValues?->items()[0]->value);
        $this->assertCount(2, $row->metricValues);
        $this->assertEquals(123, $row->metricValues->items()[0]->value);
        $this->assertEquals(0.123, $row->metricValues->items()[1]->value);

        $this->assertInstanceOf(Row::class, ($row = $response->rows->items()[1]));
        $this->assertEquals(1, $row->dimensionValues?->count());
        $this->assertEquals('Browser2', $row->dimensionValues?->items()[0]->value);
        $this->assertCount(2, $row->metricValues);
        $this->assertEquals(456, $row->metricValues->items()[0]->value);
        $this->assertEquals(0.456, $row->metricValues->items()[1]->value);

        $this->assertEquals(1, $response->totals?->count());
        $this->assertInstanceOf(Total::class, ($totalRow = $response->totals?->items()[0]));
        $this->assertEquals(1, $totalRow->dimensionValues->count());
        $this->assertEquals('RESERVED_TOTAL', $totalRow->dimensionValues->items()[0]->value);
        $this->assertCount(2, $totalRow->metricValues);
        $this->assertEquals(579, $totalRow->metricValues->items()[0]->value);
        $this->assertEquals(0.579, $totalRow->metricValues->items()[1]->value);

        $this->assertInstanceOf(PropertyQuota::class, $response->propertyQuota);
        $this->assertEquals(9, $response->propertyQuota->tokensPerDay->consumed);
        $this->assertEquals(24821, $response->propertyQuota->tokensPerDay->remaining);
        $this->assertEquals(9, $response->propertyQuota->tokensPerHour->consumed);
        $this->assertEquals(4981, $response->propertyQuota->tokensPerHour->remaining);
        $this->assertEquals(10, $response->propertyQuota->concurrentRequests->remaining);
        $this->assertEquals(10, $response->propertyQuota->serverErrorsPerProjectPerHour->remaining);
        $this->assertEquals(120, $response->propertyQuota->potentiallyThresholdedRequestsPerHour->remaining);
        $this->assertEquals(9, $response->propertyQuota->tokensPerProjectPerHour->consumed);
        $this->assertEquals(1231, $response->propertyQuota->tokensPerProjectPerHour->remaining);
    }
}
