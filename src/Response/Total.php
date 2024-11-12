<?php

namespace Gtmassey\LaravelAnalytics\Response;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Total extends Data
{
    /**
     * @param  DataCollection<int, DimensionValue>  $dimensionValues
     * @param  DataCollection<int, MetricValue>  $metricValues
     */
    public function __construct(
        #[DataCollectionOf(DimensionValue::class)]
        public DataCollection $dimensionValues,
        #[DataCollectionOf(MetricValue::class)]
        public DataCollection $metricValues,
    ) {
    }
}
