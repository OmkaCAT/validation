<?php

namespace Tests\Unit\DataProvider\Rules;

class BetweenRuleTestDataProvider
{
    public static function validate(): array
    {
        return [
            [
                'value' => 2,
                'parameters' => [
                    'min_value' => 1,
                    'max_value' => 3
                ],
                'expected' => true
            ],
            [
                'value' => 1,
                'parameters' => [
                    'min_value' => 2,
                    'max_value' => 5
                ],
                'expected' => false
            ],
            [
                'value' => 2,
                'parameters' => [
                    'min_value' => 4,
                    'max_value' => 1
                ],
                'expected' => false
            ],
            [
                'value' => 'aa',
                'parameters' => [
                    'min_value' => 1,
                    'max_value' => 3
                ],
                'expected' => false
            ],
        ];
    }
}