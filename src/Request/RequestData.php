<?php

namespace Gtmassey\LaravelAnalytics\Request;

use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\FilterExpression as BaseFilterExpression;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\MetricAggregation;
use Gtmassey\LaravelAnalytics\Request\Filters\FilterExpression;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

/**
 * @param  string  $propertyId,
 * @param  Collection<int, DateRange>  $dateRanges
 * @param  Collection<int, Metric>  $metrics
 * @param  Collection<int, Dimension>  $dimensions
 */
class RequestData extends Data
{
    public function __construct(
        public string $propertyId,
        /** @var Collection<int, DateRange> */
        public Collection $dateRanges = new Collection,
        /** @var Collection<int, Metric> */
        public Collection $metrics = new Collection,
        /** @var Collection<int, Dimension> */
        public Collection $dimensions = new Collection,

        public ?FilterExpression $dimensionFilter = null,

        public ?FilterExpression $metricFilter = null,

        public bool $returnPropertyQuota = true,

        public bool $useTotals = false,

        public int $limit = 10_000,

        public int $offset = 0,
    ) {}

    /** @return array{property: string, dateRanges: DateRange[], dimensions: Dimension[], metrics: Metric[], dimensionFilter: BaseFilterExpression|null, returnPropertyQuota: bool, metricAggregations: int[]} */
    public function toArray(): array
    {
        return [
            'property' => 'properties/'.$this->propertyId,
            'dateRanges' => $this->dateRanges->all(),
            'dimensions' => $this->dimensions->unique()->all(),
            'metrics' => $this->metrics->unique()->all(),
            'dimensionFilter' => $this->dimensionFilter?->toRequest(),
            'metricFilter' => $this->metricFilter?->toRequest(),
            'returnPropertyQuota' => $this->returnPropertyQuota,
            'metricAggregations' => $this->useTotals ? [MetricAggregation::TOTAL] : [],
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }
}
