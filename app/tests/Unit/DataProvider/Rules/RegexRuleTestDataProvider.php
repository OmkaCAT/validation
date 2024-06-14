<?php

namespace Tests\Unit\DataProvider\Rules;

class RegexRuleTestDataProvider
{
    public static function validate(): array
    {
        return [
            [
                'value' => 'test@example.com',
                'regex' => '/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/',
                'expected' => true
            ],
            [
                'value' => 0,
                'regex' => '/([0-9]{1})/',
                'expected' => true
            ],
            [
                'value' => 't',
                'regex' => '/([0-9]{1})/',
                'expected' => false
            ],
        ];
    }
}