<?php

namespace Gtmassey\LaravelAnalytics\Response\Quotas;

use Spatie\LaravelData\Data;

class PotentiallyThresholdedRequestsPerHour extends Data
{
    public function __construct(
        public int $remaining,
    ) {
    }
}
