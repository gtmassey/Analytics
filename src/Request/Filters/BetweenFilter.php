<?php

namespace Gtmassey\LaravelAnalytics\Request\Filters;

use Google\Analytics\Data\V1beta\Filter\BetweenFilter as BaseBetweenFilter;
use Google\Analytics\Data\V1beta\NumericValue;

class BetweenFilter implements FilterContract
{
    public function __construct(
        private readonly float|int $min = 0,
        private readonly float|int $max = 0,
        private readonly NumericValueType $valueType = NumericValueType::INTEGER,
        private readonly FilterField $field = FilterField::BETWEEN_FILTER,
    ) {
    }

    public function toRequest(): BaseBetweenFilter
    {
        return new BaseBetweenFilter([
            'from_value' => new NumericValue([
                $this->valueType->value => $this->min,
            ]),
            'to_value' => new NumericValue([
                $this->valueType->value => $this->max,
            ]),
        ]);
    }

    public function field(): FilterField
    {
        return $this->field;
    }
}
