<?php

namespace Tests\Unit\DataProvider\Rules;

class BooleanRuleTestDataProvider
{
    public static function validate(): array
    {
        return [
            [
                'value' => 1,
                'expected' => true
            ],
            [
                'value' => 0,
                'expected' => true
            ],
            [
                'value' => '1',
                'expected' => true
            ],
            [
                'value' => '0',
                'expected' => true
            ],
            [
                'value' => true,
                'expected' => true
            ],
            [
                'value' => false,
                'expected' => true
            ],
            [
                'value' => 'test',
                'expected' => false
            ],
            [
                'value' => null,
                'expected' => false
            ],
            [
                'value' => [],
                'expected' => false
            ],
        ];
    }
}