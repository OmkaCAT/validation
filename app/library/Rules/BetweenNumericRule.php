<?php

namespace Validation\Rules;

use Validation\Rule;
use Validation\Validator;

class BetweenNumericRule extends Rule
{
    protected string $message = ':attribute должно находиться в диапазоне от :min_value до :max_value.';

    public function validate(mixed $value): bool
    {
        $minValue = $this->getParameter('min_value');
        $maxValue = $this->getParameter('max_value');

        $validator = new Validator([
            'value' => $value,
            'min_value' => $minValue,
            'max_value' => $maxValue
        ], [
            'min_value' => [new NumericRule()],
            'max_value' => [new NumericRule()],
            'value' => [
                new NumericRule(),
                (new GreaterThanNumericRule())->addParameter('other_value', $minValue),
                (new LessThanNumericRule())->addParameter('other_value', $maxValue)
            ],
        ]);
        $validator->stopOnFirstFailure();

        return $validator->passes();
    }
}