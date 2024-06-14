<?php

namespace Tests\Unit\Rules;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\DataProvider\Rules\BooleanRuleTestDataProvider;
use Validation\Rules\BooleanRule;

class BooleanRuleTest extends TestCase
{
    #[DataProviderExternal(BooleanRuleTestDataProvider::class, 'validate')]
    public function testValidate(mixed $value, bool $expected)
    {
        $rule = new BooleanRule();
        $actual = $rule->validate($value);
        $this->assertSame($expected, $actual);
    }
}