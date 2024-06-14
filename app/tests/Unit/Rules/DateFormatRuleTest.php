<?php

namespace Tests\Unit\Rules;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\DataProvider\Rules\DateFormatRuleTestDataProvider;
use Validation\Rules\DateFormatRule;

class DateFormatRuleTest extends TestCase
{
    #[DataProviderExternal(DateFormatRuleTestDataProvider::class, 'validate')]
    public function testValidate(mixed $value, string $format, bool $expected)
    {
        $rule = new DateFormatRule();
        $rule->addParameter('format', $format);
        $actual = $rule->validate($value);
        $this->assertSame($expected, $actual);
    }
}