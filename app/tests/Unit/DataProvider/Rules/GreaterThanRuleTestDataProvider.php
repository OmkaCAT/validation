<?php

namespace Tests\Unit\DataProvider\Rules;

class GreaterThanRuleTestDataProvider
{
    public static function validate(): array
    {
        return [
            [
                'value'      => 1,
                'otherValue' => 1,
                'expected'   => false
            ],
            [
                'value'      => 1,
                'otherValue' => 2,
                'expected'   => false
            ],
            [
                'value'      => 2,
                'otherValue' => 1,
                'expected'   => true
            ]
        ];
    }

    public static function failMessage(): array
    {
        return [
            [
                'value'      => 1,
                'otherValue' => 2,
                'message' => 'test :attribute :other_value test',
                'fail' => static function (string $attribute, mixed $value, array $parameters) {
                    return str_replace(
                        [':attribute', ':other_value', ':value'],
                        [$attribute, $parameters['other_value'], $value],
                        ':attribute :value < :other_value'
                    );
                },
                'expected'   => 'test 1 < 2'
            ],
        ];
    }
}