<?php

namespace Gtmassey\LaravelAnalytics\Request\Filters;

use Google\Analytics\Data\V1beta\Filter\InListFilter as BaseInListFilter;

class InListFilter implements FilterContract
{
    public function __construct(
        public array $values = [],
        public bool $caseSensitive = false,
        private readonly FilterField $field = FilterField::IN_LIST_FILTER,
    ) {
    }

    public function field(): FilterField
    {
        return $this->field;
    }

    public function toRequest(): BaseInListFilter
    {
        return new BaseInListFilter([
            'values' => $this->values,
            'case_sensitive' => $this->caseSensitive,
        ]);
    }
}
