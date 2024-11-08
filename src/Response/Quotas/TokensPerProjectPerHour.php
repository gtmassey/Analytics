<?php

namespace Gtmassey\LaravelAnalytics\Response\Quotas;

use Spatie\LaravelData\Data;

class TokensPerProjectPerHour extends Data
{
    public function __construct(
        public int $consumed,
        public int $remaining,
    ) {
    }
}
