<?php

namespace Tests\Unit\DataProvider\Rules;

class DateFormatRuleTestDataProvider
{
    public static function validate(): array
    {
        return [
            [
                'value' => '2024-06-01',
                'format' => 'Y-m-d',
                'expected' => true
            ],
            [
                'value' => 0,
                'format' => 'Y-m-d',
                'expected' => false
            ],
            [
                'value' => '1',
                'format' => 'Y-m-d',
                'expected' => false
            ],
            [
                'value' => true,
                'format' => 'Y-m-d',
                'expected' => false
            ],
            [
                'value' => '01.10.2024 10:00',
                'format' => 'd.m.Y H:i',
                'expected' => true
            ],
            [
                'value' => '10:00:00 01.10.2024',
                'format' => 'H:i:s d.m.Y',
                'expected' => true
            ],
        ];
    }
}