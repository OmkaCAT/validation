<?php

namespace Tests\Unit\Rules;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\DataProvider\Rules\ArrayRuleTestDataProvider;
use Validation\Rules\ArrayRule;

class ArrayRuleTest extends TestCase
{
    #[DataProviderExternal(ArrayRuleTestDataProvider::class, 'validate')]
    public function testValidate(mixed $value, bool $expected)
    {
        $rule = new ArrayRule();
        $actual = $rule->validate($value);
        $this->assertSame($expected, $actual);
    }
}