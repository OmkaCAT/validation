<?php

namespace Tests\Unit\Rules;

use Closure;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\DataProvider\Rules\GreaterThanRuleTestDataProvider;
use Validation\Rules\GreaterThanNumericRule;

class GreaterThanRuleTest extends TestCase
{
    #[DataProviderExternal(GreaterThanRuleTestDataProvider::class, 'validate')]
    public function testValidate(mixed $value, mixed $otherValue, bool $expected)
    {
        $rule = new GreaterThanNumericRule();
        $rule->addParameter('other_value', $otherValue);
        $actual = $rule->validate($value);
        $this->assertSame($expected, $actual);
    }

    #[DataProviderExternal(GreaterThanRuleTestDataProvider::class, 'failMessage')]
    public function testFailMessage(mixed $value, mixed $otherValue, string $message, Closure $fail, string $expected)
    {
        $rule = new GreaterThanNumericRule();
        $rule->addParameter('other_value', $otherValue);
        $rule->setMessage($message);
        $rule->setFailClosure($fail);
        $actual = $rule->fail('test', $value);
        $this->assertSame($expected, $actual);
    }
}