<?php

namespace Gtmassey\LaravelAnalytics\Request;

use Closure;
use Google\Analytics\Data\V1beta\OrderBy as BaseOrderBy;
use Google\Analytics\Data\V1beta\OrderBy\DimensionOrderBy;
use Google\Analytics\Data\V1beta\OrderBy\DimensionOrderBy\OrderType;
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;
use Gtmassey\LaravelAnalytics\Exceptions\InvalidOrderByException;
use Illuminate\Support\Collection;

class OrderBy
{
    public function __construct(
        /** @var Collection<int, BaseOrderBy> */
        private readonly Collection $orderBys = new Collection(),
    ) {
    }

    /**
     * @throws InvalidOrderByException
     */
    private function metric(Closure $metricsCallback, bool $desc = false): static
    {
        /** @var Metrics $metrics */
        $metrics = $metricsCallback(resolve(Metrics::class));

        $firstMetric = $metrics->first();

        if ($firstMetric === null) {
            throw InvalidOrderByException::noMetricOrderBy();
        }

        $this->orderBys->add(new BaseOrderBy([
            'metric' => new MetricOrderBy([
                'metric_name' => $firstMetric->getName(),
            ]),
            'desc' => $desc,
        ]));

        return $this;
    }

    /**
     * @throws InvalidOrderByException
     */
    public function metricDesc(Closure $metricsCallback): static
    {
        return $this->metric($metricsCallback, true);
    }

    /**
     * @throws InvalidOrderByException
     */
    public function metricAsc(Closure $metricsCallback): static
    {
        return $this->metric($metricsCallback);
    }

    /**
     * @throws InvalidOrderByException
     */
    private function dimension(Closure $dimensionsCallback, int $orderType, bool $desc = false): static
    {
        /** @var Dimensions $dimensions */
        $dimensions = $dimensionsCallback(resolve(Dimensions::class));

        $firstDimension = $dimensions->first();

        if ($firstDimension === null) {
            throw InvalidOrderByException::noDimensionOrderBy();
        }

        $this->orderBys->add(new BaseOrderBy([
            'dimension' => new DimensionOrderBy([
                'dimension_name' => $firstDimension->getName(),
                'order_type' => $orderType,
            ]),
            'desc' => $desc,
        ]));

        return $this;
    }

    /**
     * @throws InvalidOrderByException
     */
    public function alphanumericDimensionDesc(Closure $dimensionsCallback): static
    {
        return $this->dimension($dimensionsCallback, OrderType::ALPHANUMERIC, true);
    }

    /**
     * @throws InvalidOrderByException
     */
    public function alphanumericDimensionAsc(Closure $dimensionsCallback): static
    {
        return $this->dimension($dimensionsCallback, OrderType::ALPHANUMERIC);
    }

    /**
     * @throws InvalidOrderByException
     */
    public function caseInsensitiveAlphanumericDimensionDesc(Closure $dimensionsCallback): static
    {
        return $this->dimension($dimensionsCallback, OrderType::CASE_INSENSITIVE_ALPHANUMERIC, true);
    }

    /**
     * @throws InvalidOrderByException
     */
    public function caseInsensitiveAlphanumericDimensionAsc(Closure $dimensionsCallback): static
    {
        return $this->dimension($dimensionsCallback, OrderType::CASE_INSENSITIVE_ALPHANUMERIC);
    }

    /**
     * @throws InvalidOrderByException
     */
    public function numericDimensionDesc(Closure $dimensionsCallback): static
    {
        return $this->dimension($dimensionsCallback, OrderType::NUMERIC, true);
    }

    /**
     * @throws InvalidOrderByException
     */
    public function numericDimensionAsc(Closure $dimensionsCallback): static
    {
        return $this->dimension($dimensionsCallback, OrderType::NUMERIC);
    }

    /**
     * @return Collection<int, BaseOrderBy>
     */
    public function getOrderBys(): Collection
    {
        return $this->orderBys;
    }
}
