<?php

namespace Gtmassey\LaravelAnalytics\Response;

use Spatie\LaravelData\Data;

class MetricHeader extends Data
{
    public function __construct(
        public string $name,
        public string $type //Could be ENUM
    ) {
    }
}
