<?php

namespace Validation\Rules;

use DateTime;
use Validation\Rule;

class DateFormatRule extends Rule
{
    protected string $message = ':attribute должно соответствовать формату :format.';

    public function validate(mixed $value): bool
    {
        if (! is_string($value) && ! is_numeric($value)) {
            return false;
        }

        $format = $this->getParameter('format');
        $date = DateTime::createFromFormat($format, $value);
        if ($date && $date->format($format) === $value) {
            return true;
        }

        return false;
    }
}