<?php

namespace Validation\Rules;

use Symfony\Component\HttpFoundation\File\File;
use Validation\Rule;

class RequiredRule extends Rule
{
    protected string $message = ':attribute является обязательным.';

    public function validate(mixed $value): bool
    {
        if (is_null($value)) {
            return false;
        } elseif (is_string($value) && trim($value) === '') {
            return false;
        } elseif (is_countable($value) && count($value) < 1) {
            return false;
        } elseif ($value instanceof File) {
            return $value->getPath() !== '';
        }

        return true;
    }
}