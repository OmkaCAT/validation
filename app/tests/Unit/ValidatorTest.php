<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\DataProvider\ValidatorTestDataProvider;
use Validation\Validator;

final class ValidatorTest extends TestCase
{
    #[DataProviderExternal(ValidatorTestDataProvider::class, 'passes')]
    public function testPasses(array $data, array $rules, bool $expected): void
    {
        $validator = new Validator($data, $rules);
        $actual = $validator->passes();
        $this->assertSame($expected, $actual);
    }

    #[DataProviderExternal(ValidatorTestDataProvider::class, 'getErrorMessages')]
    public function testGetErrorMessages(array $data, array $rules, array $expected): void
    {
        $validator = new Validator($data, $rules);
        $validator->passes();
        $actual = $validator->getErrorMessages();
        $this->assertSame($expected, $actual);
    }
}