<?php

namespace Gtmassey\LaravelAnalytics\Exceptions;

use Exception;

class InvalidOrderByException extends Exception
{
    const NO_DIMENSION_ORDER_BY = 'No dimension to order by.';

    const NO_METRIC_ORDER_BY = 'No metric to order by.';

    public static function noDimensionOrderBy(): self
    {
        return new self(message: self::NO_DIMENSION_ORDER_BY);
    }

    public static function noMetricOrderBy(): self
    {
        return new self(message: self::NO_METRIC_ORDER_BY);
    }
}
