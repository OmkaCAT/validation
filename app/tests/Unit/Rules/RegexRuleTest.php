<?php

namespace Tests\Unit\Rules;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\DataProvider\Rules\RegexRuleTestDataProvider;
use Validation\Rules\RegexRule;

class RegexRuleTest extends TestCase
{
    #[DataProviderExternal(RegexRuleTestDataProvider::class, 'validate')]
    public function testValidate(mixed $value, string $regex, bool $expected)
    {
        $rule = new RegexRule();
        $rule->addParameter('regex', $regex);
        $actual = $rule->validate($value);
        $this->assertSame($expected, $actual);
    }
}