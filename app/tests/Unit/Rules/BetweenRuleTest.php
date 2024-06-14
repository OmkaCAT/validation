<?php

namespace Tests\Unit\Rules;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\DataProvider\Rules\BetweenRuleTestDataProvider;
use Validation\Rules\BetweenNumericRule;

class BetweenRuleTest extends TestCase
{
    #[DataProviderExternal(BetweenRuleTestDataProvider::class, 'validate')]
    public function testValidate(mixed $value, array $parameters, bool $expected)
    {
        $rule = new BetweenNumericRule();
        $rule->setParameters($parameters);
        $actual = $rule->validate($value);
        $this->assertSame($expected, $actual);
    }
}