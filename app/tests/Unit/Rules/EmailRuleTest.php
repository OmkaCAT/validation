<?php

namespace Tests\Unit\Rules;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\DataProvider\Rules\EmailRuleTestDataProvider;
use Validation\Rules\EmailRule;

class EmailRuleTest extends TestCase
{
    #[DataProviderExternal(EmailRuleTestDataProvider::class, 'validate')]
    public function testValidate(mixed $value, bool $expected)
    {
        $rule = new EmailRule();
        $actual = $rule->validate($value);
        $this->assertSame($expected, $actual);
    }
}