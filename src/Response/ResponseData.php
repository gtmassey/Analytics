<?php

namespace Gtmassey\LaravelAnalytics\Response;

use Google\Analytics\Data\V1beta\RunReportResponse;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class ResponseData extends Data
{
    /**
     * @param  DataCollection<int, DimensionHeader>|null  $dimensionHeaders
     * @param  DataCollection<int, MetricHeader>  $metricHeaders
     * @param  DataCollection<int, Row>  $rows
     * @param  DataCollection<int, Total>|null  $totals
     */
    public function __construct(
        #[DataCollectionOf(DimensionHeader::class)]
        public ?DataCollection $dimensionHeaders,
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

    public static function fromReportResponse(RunReportResponse $reportResponse): static
    {
        $json = $reportResponse->serializeToJsonString();

        $report = json_decode($json, true);

        return self::from($report + ['rows' => new DataCollection(Row::class, []), 'rowCount' => 0]);
    }
}
