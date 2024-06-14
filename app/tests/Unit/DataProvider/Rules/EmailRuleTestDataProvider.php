<?php

namespace Tests\Unit\DataProvider\Rules;

class EmailRuleTestDataProvider
{
    public static function validate(): array
    {
        return [
            [
                'value' => 'test@example.com',
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
            [
                'value' => true,
                'expected' => false
            ],
            [
                'value' => '@example.com',
                'expected' => false
            ],
            [
                'value' => 'test@test@test.com',
                'expected' => false
            ],
        ];
    }
}