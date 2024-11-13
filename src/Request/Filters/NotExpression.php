<?php

namespace Gtmassey\LaravelAnalytics\Request\Filters;

use Closure;
use Google\Analytics\Data\V1beta\FilterExpression as BaseFilterExpression;

class NotExpression implements FilterExpressionContract
{
    private FilterExpression $expression;

    /**
     * @param  Closure(FilterExpression): FilterExpression  $expression
     */
    public function __construct(
        Closure $expression,
        private readonly FilterExpressionField $field = FilterExpressionField::NOT_EXPRESSION,
    ) {
        $this->expression = $expression(new FilterExpression);
    }

    public function toRequest(): BaseFilterExpression
    {
        return $this->expression->toRequest();
    }

    public function field(): FilterExpressionField
    {
        return $this->field;
    }
}
