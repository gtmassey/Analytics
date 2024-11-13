<?php

namespace Gtmassey\LaravelAnalytics\Request\Filters;

use Google\Analytics\Data\V1beta\Filter as BaseFilter;
use Google\Analytics\Data\V1beta\Filter\NumericFilter\Operation;
use Google\Analytics\Data\V1beta\Filter\StringFilter\MatchType;

class Filter implements FilterExpressionContract
{
    public ?string $fieldName = null;

    public ?FilterContract $expression = null;

    public function __construct(
        string $fieldName,
        private readonly FilterExpressionField $field = FilterExpressionField::FILTER,
    ) {
        $this->fieldName = $fieldName;
    }

    public function exact(string $value, bool $caseSensitive = false): static
    {
        $this->expression = new StringFilter(
            matchType: MatchType::EXACT,
            value: $value,
            caseSensitive: $caseSensitive,
        );

        return $this;
    }

    public function beginsWith(string $value, bool $caseSensitive = false): static
    {
        $this->expression = new StringFilter(
            matchType: MatchType::BEGINS_WITH,
            value: $value,
            caseSensitive: $caseSensitive,
        );

        return $this;
    }

    public function endsWith(string $value, bool $caseSensitive = false): static
    {
        $this->expression = new StringFilter(
            matchType: MatchType::ENDS_WITH,
            value: $value,
            caseSensitive: $caseSensitive,
        );

        return $this;
    }

    public function contains(string $value, bool $caseSensitive = false): static
    {
        $this->expression = new StringFilter(
            matchType: MatchType::CONTAINS,
            value: $value,
            caseSensitive: $caseSensitive,
        );

        return $this;
    }

    public function fullRegexp(string $value, bool $caseSensitive = false): static
    {
        $this->expression = new StringFilter(
            matchType: MatchType::FULL_REGEXP,
            value: $value,
            caseSensitive: $caseSensitive,
        );

        return $this;
    }

    public function partialRegexp(string $value, bool $caseSensitive = false): static
    {
        $this->expression = new StringFilter(
            matchType: MatchType::PARTIAL_REGEXP,
            value: $value,
            caseSensitive: $caseSensitive,
        );

        return $this;
    }

    /**
     * @param  list<string>  $values
     */
    public function inList(array $values, bool $caseSensitive = false): static
    {
        $this->expression = new InListFilter(
            values: $values,
            caseSensitive: $caseSensitive,
        );

        return $this;
    }

    public function equalInt(int $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::EQUAL,
            value: $value,
            valueType: NumericValueType::INTEGER,
        );

        return $this;
    }

    public function equalFloat(float $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::EQUAL,
            value: $value,
            valueType: NumericValueType::FLOAT,
        );

        return $this;
    }

    public function lessThanInt(int $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::LESS_THAN,
            value: $value,
            valueType: NumericValueType::INTEGER,
        );

        return $this;
    }

    public function lessThanFloat(float $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::LESS_THAN,
            value: $value,
            valueType: NumericValueType::FLOAT,
        );

        return $this;
    }

    public function lessThanOrEqualInt(int $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::LESS_THAN_OR_EQUAL,
            value: $value,
            valueType: NumericValueType::INTEGER,
        );

        return $this;
    }

    public function lessThanOrEqualFloat(float $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::LESS_THAN_OR_EQUAL,
            value: $value,
            valueType: NumericValueType::FLOAT,
        );

        return $this;
    }

    public function greaterThanInt(int $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::GREATER_THAN,
            value: $value,
            valueType: NumericValueType::INTEGER,
        );

        return $this;
    }

    public function greaterThanFloat(float $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::GREATER_THAN,
            value: $value,
            valueType: NumericValueType::FLOAT,
        );

        return $this;
    }

    public function greaterThanOrEqualInt(int $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::GREATER_THAN_OR_EQUAL,
            value: $value,
            valueType: NumericValueType::INTEGER,
        );

        return $this;
    }

    public function greaterThanOrEqualFloat(float $value): static
    {
        $this->expression = new NumericFilter(
            operation: Operation::GREATER_THAN_OR_EQUAL,
            value: $value,
            valueType: NumericValueType::FLOAT,
        );

        return $this;
    }

    public function betweenInt(int $min, int $max): static
    {
        $this->expression = new BetweenFilter(
            min: $min,
            max: $max,
            valueType: NumericValueType::INTEGER,
        );

        return $this;
    }

    public function betweenFloat(float $min, float $max): static
    {
        $this->expression = new BetweenFilter(
            min: $min,
            max: $max,
            valueType: NumericValueType::FLOAT,
        );

        return $this;
    }

    public function toRequest(): BaseFilter
    {
        return new BaseFilter([
            'field_name' => $this->fieldName,
            $this->expression?->field()->value => $this->expression?->toRequest(),
        ]);
    }

    public function field(): FilterExpressionField
    {
        return $this->field;
    }
}
