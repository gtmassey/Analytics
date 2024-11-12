<?php

namespace Gtmassey\LaravelAnalytics\Request\Filters;

use Google\Analytics\Data\V1beta\Filter\NumericFilter as BaseNumericFilter;
use Google\Analytics\Data\V1beta\Filter\NumericFilter\Operation;
use Google\Analytics\Data\V1beta\NumericValue;

class NumericFilter implements FilterContract
{
    public function __construct(
        private readonly int $operation = Operation::OPERATION_UNSPECIFIED,
        private readonly float|int $value = 0,
        private readonly NumericValueType $valueType = NumericValueType::INTEGER,
        private readonly FilterField $field = FilterField::NUMERIC_FILTER,
    ) {
    }

    public function toRequest(): BaseNumericFilter
    {
        return new BaseNumericFilter([
            'operation' => $this->operation,
            'value' => new NumericValue([
                $this->valueType->value => $this->value,
            ]),
        ]);
    }

    public function field(): FilterField
    {
        return $this->field;
    }
}
