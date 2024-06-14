<?php

namespace Validation\Rules;

use Validation\Rule;

class IntegerRule extends Rule
{
    protected string $message = ':attribute должно быть целым числом.';

    public function validate(mixed $value): bool
    {
        return is_integer($value);
    }
}