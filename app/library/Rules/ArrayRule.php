<?php

namespace Validation\Rules;

use Validation\Rule;

class ArrayRule extends Rule
{
    protected string $message = ':attribute должен быть массивом.';

    public function validate(mixed $value): bool
    {
        return is_array($value);
    }
}