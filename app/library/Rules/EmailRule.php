<?php

namespace Validation\Rules;

use Validation\Rule;

class EmailRule extends Rule
{
    protected string $message = ':attribute должно быть действительным адресом электронной почты.';

    public function validate(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}