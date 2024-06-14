<?php

namespace Validation\Rules;

use Validation\Rule;

class RegexRule extends Rule
{
    protected string $message = 'Недопустимый формат поля :attribute.';

    public function validate(mixed $value): bool
    {
        if (! is_string($value) && ! is_numeric($value)) {
            return false;
        }

        return preg_match($this->getParameter('regex'), $value) > 0;
    }
}