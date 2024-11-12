<?php

namespace Gtmassey\LaravelAnalytics\Response;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Row extends Data
{
    /**
     * @param  DataCollection<int, DimensionValue>|null  $dimensionValues
     * @param  DataCollection<int, MetricValue>  $metricValues
     */
    public function __construct(
        #[DataCollectionOf(DimensionValue::class)]
        public ?DataCollection $dimensionValues,
        #[DataCollectionOf(MetricValue::class)]
        public DataCollection $metricValues,
    ) {
    }
}
