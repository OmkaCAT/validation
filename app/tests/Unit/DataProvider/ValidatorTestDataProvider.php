<?php

namespace Tests\Unit\DataProvider;

use Validation\Rules\RequiredRule;
use Validation\Rules\StringRule;

final class ValidatorTestDataProvider
{
    public static function passes(): array
    {
        return [
            [
                'data' => [
                    'required_attributes' => null
                ],
                'rules' => [
                    'required_attributes' => [new RequiredRule()]
                ],
                'expected' => false
            ]
        ];
    }

    public static function getErrorMessages(): array
    {
        return [
            [
                'data' => [
                    'required_attributes' => null
                ],
                'rules' => [
                    'required_attributes' => [new RequiredRule()]
                ],
                'expected' => [
                    'required_attributes' => [
                        'required_attributes является обязательным.'
                    ]
                ]
            ],
            [
                'data' => [
                    'test' => null
                ],
                'rules' => [
                    'test' => [new RequiredRule(), new StringRule()]
                ],
                'expected' => [
                    'test' => [
                        'test является обязательным.',
                        'test должно быть строкой.',
                    ]
                ]
            ],
            [
                'data' => [
                    'required_attributes' => null
                ],
                'rules' => [
                    'required_attributes' => [(new RequiredRule())
                        ->setParameters([
                            'test_param1' => 'param1',
                            'test_param2' => 'param2'
                        ])
                        ->setMessage(':test_param1 :test_param2')]
                ],
                'expected' => [
                    'required_attributes' => [
                        'param1 param2'
                    ]
                ]
            ],
        ];
    }
}