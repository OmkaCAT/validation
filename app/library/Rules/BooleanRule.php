<?php

namespace Validation\Rules;

use Validation\Rule;

class BooleanRule extends Rule
{
    protected string $message = ':attribute должно иметь значение true или false.';

    protected array $acceptable = [true, false, 0, 1, '0', '1'];

    public function validate(mixed $value): bool
    {
        return in_array($value, $this->acceptable, true);
    }
}