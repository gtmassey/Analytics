<?php

namespace GarrettMassey\Analytics\Response;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class ResponseData extends Data
{
    /**
     * @param  DataCollection<int, DimensionHeader>  $dimensionHeaders
     * @param  DataCollection<int, MetricHeader>  $metricHeaders
     * @param  DataCollection<int, Row>  $rows
     * @param  DataCollection<int, Total>|null  $totals
     * @param  int  $rowCount
     * @param  Metadata  $metadata
     * @param  PropertyQuota|null  $propertyQuota
     * @param  string  $kind
     */
    public function __construct(
        #[DataCollectionOf(DimensionHeader::class)]
        public DataCollection $dimensionHeaders,
        #[DataCollectionOf(MetricHeader::class)]
        public DataCollection $metricHeaders,
        #[DataCollectionOf(Row::class)]
        public DataCollection $rows,
        #[DataCollectionOf(Total::class)]
        public ?DataCollection $totals,
        public int $rowCount,
        public Metadata $metadata,
        public ?PropertyQuota $propertyQuota,
        public string $kind,
    ) {
    }
}
