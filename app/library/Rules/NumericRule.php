<?php

namespace Validation\Rules;

use Validation\Rule;

class NumericRule extends Rule
{
    protected string $message = ':attribute должно быть числом.';

    public function validate(mixed $value): bool
    {
        return is_numeric($value);
    }
}