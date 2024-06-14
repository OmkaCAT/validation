<?php

namespace Tests\Unit\DataProvider\Rules;

class ArrayRuleTestDataProvider
{
    public static function validate(): array
    {
        return [
            [
                'value' => [],
                'expected' => true
            ],
            [
                'value' => 0,
                'expected' => false
            ],
            [
                'value' => '1',
                'expected' => false
            ],
        ];
    }
}