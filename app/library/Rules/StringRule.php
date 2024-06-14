<?php

namespace Validation\Rules;

use Validation\Rule;

class StringRule extends Rule
{
    protected string $message = ':attribute должно быть строкой.';

    public function validate(mixed $value): bool
    {
        return is_string($value);
    }
}