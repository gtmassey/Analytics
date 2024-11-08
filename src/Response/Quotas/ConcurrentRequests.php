<?php

namespace Gtmassey\LaravelAnalytics\Response\Quotas;

use Spatie\LaravelData\Data;

class ConcurrentRequests extends Data
{
    public function __construct(
        public int $remaining,
    ) {
    }
}
