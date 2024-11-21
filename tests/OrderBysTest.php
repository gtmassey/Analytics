<?php

namespace Gtmassey\LaravelAnalytics\Tests;

use Google\Analytics\Data\V1beta\OrderBy as BaseOrderBy;
use Gtmassey\LaravelAnalytics\Analytics;
use Gtmassey\LaravelAnalytics\Exceptions\InvalidOrderByException;
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Request\OrderBy;
use Gtmassey\LaravelAnalytics\Request\RequestData;
use ReflectionProperty;

class OrderBysTest extends TestCase
{
    public function test_invalid_metric_order_by(): void
    {
        $this->expectException(InvalidOrderByException::class);
        $this->expectExceptionMessage(InvalidOrderByException::NO_METRIC_ORDER_BY);

        Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->metricDesc(fn (Metrics $metrics) => $metrics)
            );
    }

    public function test_order_by_metric_asc(): void
    {
        $analytics = Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->metricAsc(fn (Metrics $metrics) => $metrics->sessions())
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $orderBy = $requestData->orderBys->first();

        $this->assertNotNull($orderBy);

        $this->assertInstanceOf(BaseOrderBy::class, $orderBy);

        $this->assertEquals([
            'metric' => [
                'metricName' => 'sessions',
            ],
        ], json_decode($orderBy->serializeToJsonString(), true));
    }

    public function test_order_by_metric_desc(): void
    {
        $analytics = Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->metricDesc(fn (Metrics $metrics) => $metrics->sessions())
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $orderBy = $requestData->orderBys->first();

        $this->assertNotNull($orderBy);

        $this->assertInstanceOf(BaseOrderBy::class, $orderBy);

        $this->assertEquals([
            'metric' => [
                'metricName' => 'sessions',
            ],
            'desc' => true,
        ], json_decode($orderBy->serializeToJsonString(), true));
    }

    public function test_invalid_dimension_order_by(): void
    {
        $this->expectException(InvalidOrderByException::class);
        $this->expectExceptionMessage(InvalidOrderByException::NO_DIMENSION_ORDER_BY);

        Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->alphanumericDimensionAsc(fn (Dimensions $dimensions) => $dimensions)
            );
    }

    public function test_order_by_alphanumeric_dimension_asc(): void
    {
        $analytics = Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->alphanumericDimensionAsc(fn (Dimensions $dimensions) => $dimensions->browser())
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $orderBy = $requestData->orderBys->first();

        $this->assertNotNull($orderBy);

        $this->assertInstanceOf(BaseOrderBy::class, $orderBy);

        $this->assertEquals([
            'dimension' => [
                'dimensionName' => 'browser',
                'orderType' => 'ALPHANUMERIC',
            ],
        ], json_decode($orderBy->serializeToJsonString(), true));
    }

    public function test_order_by_alphanumeric_dimension_desc(): void
    {
        $analytics = Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->alphanumericDimensionDesc(fn (Dimensions $dimensions) => $dimensions->browser())
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $orderBy = $requestData->orderBys->first();

        $this->assertNotNull($orderBy);

        $this->assertInstanceOf(BaseOrderBy::class, $orderBy);

        $this->assertEquals([
            'dimension' => [
                'dimensionName' => 'browser',
                'orderType' => 'ALPHANUMERIC',
            ],
            'desc' => true,
        ], json_decode($orderBy->serializeToJsonString(), true));
    }

    public function test_order_by_case_insensitive_alphanumeric_dimension_asc(): void
    {
        $analytics = Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->caseInsensitiveAlphanumericDimensionAsc(fn (Dimensions $dimensions) => $dimensions->browser())
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $orderBy = $requestData->orderBys->first();

        $this->assertNotNull($orderBy);

        $this->assertInstanceOf(BaseOrderBy::class, $orderBy);

        $this->assertEquals([
            'dimension' => [
                'dimensionName' => 'browser',
                'orderType' => 'CASE_INSENSITIVE_ALPHANUMERIC',
            ],
        ], json_decode($orderBy->serializeToJsonString(), true));
    }

    public function test_order_by_case_insensitive_alphanumeric_dimension_desc(): void
    {
        $analytics = Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->caseInsensitiveAlphanumericDimensionDesc(fn (Dimensions $dimensions) => $dimensions->browser())
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $orderBy = $requestData->orderBys->first();

        $this->assertNotNull($orderBy);

        $this->assertInstanceOf(BaseOrderBy::class, $orderBy);

        $this->assertEquals([
            'dimension' => [
                'dimensionName' => 'browser',
                'orderType' => 'CASE_INSENSITIVE_ALPHANUMERIC',
            ],
            'desc' => true,
        ], json_decode($orderBy->serializeToJsonString(), true));
    }

    public function test_order_by_case_insensitive_numeric_dimension_asc(): void
    {
        $analytics = Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->numericDimensionAsc(fn (Dimensions $dimensions) => $dimensions->browser())
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $orderBy = $requestData->orderBys->first();

        $this->assertNotNull($orderBy);

        $this->assertInstanceOf(BaseOrderBy::class, $orderBy);

        $this->assertEquals([
            'dimension' => [
                'dimensionName' => 'browser',
                'orderType' => 'NUMERIC',
            ],
        ], json_decode($orderBy->serializeToJsonString(), true));
    }

    public function test_order_by_case_numeric_dimension_desc(): void
    {
        $analytics = Analytics::query()
            ->setOrderBys(fn (OrderBy $orderBy) => $orderBy
                ->numericDimensionDesc(fn (Dimensions $dimensions) => $dimensions->browser())
            );

        $this->assertInstanceOf(Analytics::class, $analytics);

        /** @var RequestData $requestData */
        $requestData = (new ReflectionProperty(Analytics::class, 'requestData'))->getValue($analytics);

        $orderBy = $requestData->orderBys->first();

        $this->assertNotNull($orderBy);

        $this->assertInstanceOf(BaseOrderBy::class, $orderBy);

        $this->assertEquals([
            'dimension' => [
                'dimensionName' => 'browser',
                'orderType' => 'NUMERIC',
            ],
            'desc' => true,
        ], json_decode($orderBy->serializeToJsonString(), true));
    }
}
