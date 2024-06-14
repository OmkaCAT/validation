<?php

namespace Tests\Unit\Rules;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\DataProvider\Rules\RequiredRuleTestDataProvider;
use Validation\Rules\RequiredRule;

class RequiredRuleTest extends TestCase
{
    #[DataProviderExternal(RequiredRuleTestDataProvider::class, 'validate')]
    public function testValidate(mixed $value, bool $expected)
    {
        $rule = new RequiredRule();
        $actual = $rule->validate($value);
        $this->assertSame($expected, $actual);
    }
}