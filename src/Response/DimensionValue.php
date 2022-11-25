<?php

namespace GarrettMassey\Analytics\Response;

use Spatie\LaravelData\Data;

class DimensionValue extends Data
{
    public function __construct(
        public string $value,
    ) {
    }
}
