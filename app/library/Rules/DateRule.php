<?php

namespace Validation\Rules;

use DateTimeInterface;
use Validation\Rule;

class DateRule extends Rule
{
    protected string $message = ':attribute должно содержать действительную дату.';

    public function validate(mixed $value): bool
    {
        if ($value instanceof DateTimeInterface) {
            return true;
        }

        if ((! is_string($value)) || strtotime($value) === false) {
            return false;
        }

        $date = date_parse($value);

        return checkdate($date['month'], $date['day'], $date['year']);
    }
}