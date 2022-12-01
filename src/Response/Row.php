<?php

namespace GarrettMassey\Analytics\Response;

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
        public DataCollection|null $dimensionValues,
        #[DataCollectionOf(MetricValue::class)]
        public DataCollection $metricValues,
    ) {
    }
}
