<?php

namespace Gtmassey\LaravelAnalytics\Request\Filters;

use Closure;
use Google\Analytics\Data\V1beta\FilterExpressionList as BaseFilterExpressionList;

class OrGroup implements FilterExpressionContract
{
    private FilterExpressionList $expression;

    /**
     * @param  Closure(FilterExpressionList): FilterExpressionList  $expression
     */
    public function __construct(
        Closure $expression,
        private readonly FilterExpressionField $field = FilterExpressionField::OR_GROUP,
    ) {
        $this->expression = $expression(new FilterExpressionList);
    }

    public function toRequest(): BaseFilterExpressionList
    {
        return $this->expression->toRequest();
    }

    public function field(): FilterExpressionField
    {
        return $this->field;
    }
}
