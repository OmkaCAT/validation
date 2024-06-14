<?php

namespace Tests\Unit\DataProvider\Rules;

class RequiredRuleTestDataProvider
{
    public static function validate(): array
    {
        return [
            [
                'value' => 1,
                'expected' => true
            ],
            [
                'value' => null,
                'expected' => false
            ],
            [
                'value' => [],
                'expected' => false
            ],
            [
                'value' => '',
                'expected' => false
            ],
            [
                'value' => 'test',
                'expected' => true
            ]
        ];
    }
}