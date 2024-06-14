<?php

namespace Validation;

use Validation\Helpers\Arr;

class Validator
{
    protected array $errorMessages = [];

    protected bool $stopOnFirstFailure = false;

    public function __construct(protected array $data, protected array $rules)
    {
        //
    }

    public function passes(): bool
    {
        foreach ($this->rules as $attribute => $rules) {
            foreach ($rules as $rule) {
                if (!$rule instanceof Rule) {
                    throw new \LogicException('Invalid rule');
                }

                if ($this->stopOnFirstFailure && !empty($this->errorMessages)) {
                    break;
                }

                $this->validateAttribute($attribute, $rule);
            }
        }

        return empty($this->errorMessages);
    }

    protected function validateAttribute(string $attribute, Rule $rule): void
    {
        $value = $this->getValue($attribute);
        $validate = $rule->validate($value);

        if (!$validate) {
            $this->addFailure($attribute, $value, $rule);
        }
    }

    protected function getValue($attribute): mixed
    {
        return Arr::get($this->data, $attribute);
    }

    protected function addFailure(string $attribute, mixed $value, Rule $rule): void
    {
        $message = $rule->fail($attribute, $value);
        $this->errorMessages[$attribute][] = $message;
    }

    public function stopOnFirstFailure($stopOnFirstFailure = true): self
    {
        $this->stopOnFirstFailure = $stopOnFirstFailure;
        return $this;
    }

    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }
}