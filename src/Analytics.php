<?php

namespace Gtmassey\LaravelAnalytics;

use Closure;
use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\ApiCore\ApiException;
use Gtmassey\LaravelAnalytics\Exceptions\InvalidPropertyIdException;
use Gtmassey\LaravelAnalytics\Reports\Reports;
use Gtmassey\LaravelAnalytics\Request\Dimensions;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Gtmassey\LaravelAnalytics\Request\Metrics;
use Gtmassey\LaravelAnalytics\Request\RequestData;
use Gtmassey\LaravelAnalytics\Response\ResponseData;
use Gtmassey\Period\Period;

class Analytics
{
    use Reports;

    private BetaAnalyticsDataClient $client;

    private RequestData $requestData;

    /**
     * @throws InvalidPropertyIdException
     */
    public function __construct(?string $propertyId = null)
    {
        $propertyId ??= config('analytics.property_id');

        if (! is_string($propertyId) || empty($propertyId)) {
            throw InvalidPropertyIdException::invalidPropertyId();
        }

        $this->client = resolve(BetaAnalyticsDataClient::class);
        $this->requestData = new RequestData(propertyId: $propertyId);
    }

    public static function query(?string $propertyId = null): static
    {
        /** @var static $analytics */
        $analytics = resolve(Analytics::class, ['propertyId' => $propertyId]);

        return $analytics;
    }

    /***************************************
     * Query Builders
     ***************************************/

    /**
     * Ability to add metrics to the query using a callback method
     * for example:
     * $query->setMetrics(function (Metrics $metrics) { $metrics->sessions()->bounceRate(); });
     */
    public function setMetrics(Closure $callback): static
    {
        /** @var Metrics $metrics */
        $metrics = $callback(resolve(Metrics::class));
        $this->requestData->metrics->push(...$metrics->getMetrics());

        return $this;
    }

    /**
     * Ability to add dimensions to the query using a callback method
     * for example:
     * $query->setDimensions(function (Dimensions $dimensions) { $dimensions->pageTitle()->pagePath(); });
     */
    public function setDimensions(Closure $callback): static
    {
        /** @var Dimensions $dimensions */
        $dimensions = $callback(resolve(Dimensions::class));
        $this->requestData->dimensions->push(...$dimensions->getDimensions());

        return $this;
    }

    /**
     * @param  Closure(FilterExpression): FilterExpression  $callback
     */
    public function dimensionFilter(Closure $callback): static
    {
        $this->requestData->dimensionFilter = $callback(new FilterExpression);

        return $this;
    }

    /**
     * @param  Closure(FilterExpression): FilterExpression  $callback
     */
    public function metricFilter(Closure $callback): static
    {
        $this->requestData->metricFilter = $callback(new FilterExpression);

        return $this;
    }

    public function forPeriod(Period $period): static
    {
        $dateRange = new DateRange([
            'start_date' => $period->startDate->toDateString(),
            'end_date' => $period->endDate->toDateString(),
        ]);
        $this->requestData->dateRanges->push($dateRange);

        return $this;
    }

    public function withTotals(bool $useTotals = true): static
    {
        $this->requestData->useTotals = $useTotals;

        return $this;
    }

    public function limit(int $limit = 10_000): static
    {
        $this->requestData->limit = $limit;

        return $this;
    }

    public function offset(int $offset = 0): static
    {
        $this->requestData->offset = $offset;

        return $this;
    }

    /***************************************
     * Process and Run Query
     ***************************************/

    /**
     * @throws ApiException
     */
    public function run(): ResponseData
    {
        $reportResponse = $this->client->runReport($this->requestData->toArray());

        return ResponseData::fromReportResponse($reportResponse);
    }
}
