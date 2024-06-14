<?php

namespace Validation\Rules;

use Validation\Rule;
use Validation\Validator;

class LessThanNumericRule extends Rule
{
    protected string $message = ':attribute должно быть меньше, чем :other_value';

    public function validate(mixed $value): bool
    {
        $otherValue = $this->getParameter('other_value');

        $validator = new Validator([
            'value'       => $value,
            'other_value' => $otherValue
        ], [
            'value'       => [new NumericRule()],
            'other_value' => [new NumericRule()],
        ]);
        $validator->stopOnFirstFailure();
        if (!$validator->passes()) {
            return false;
        }

        return $value < $otherValue;
    }
}