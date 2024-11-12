<?php

namespace Gtmassey\LaravelAnalytics\Request\Filters;

use Google\Analytics\Data\V1beta\Filter\StringFilter as BaseStringFilter;
use Google\Analytics\Data\V1beta\Filter\StringFilter\MatchType;

class StringFilter implements FilterContract
{
    public function __construct(
        private readonly int $matchType = MatchType::MATCH_TYPE_UNSPECIFIED,
        private readonly string $value = '',
        private readonly bool $caseSensitive = false,
        private readonly FilterField $field = FilterField::STRING_FILTER,
    ) {
    }

    public function toRequest(): BaseStringFilter
    {
        return new BaseStringFilter([
            'match_type' => $this->matchType,
            'value' => $this->value,
            'case_sensitive' => $this->caseSensitive,
        ]);
    }

    public function field(): FilterField
    {
        return $this->field;
    }
}
