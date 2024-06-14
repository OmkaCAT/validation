<?php

namespace Validation;

use Closure;
use RuntimeException;
use Validation\Traits\HasParameters;

abstract class Rule
{
    use HasParameters;

    protected string $message = '';

    protected ?Closure $failClosure = null;

    abstract public function validate(mixed $value): bool;

    public function setFailClosure(Closure $failClosure): self
    {
        $this->failClosure = $failClosure;
        return $this;
    }

    public function fail(string $attribute, mixed $value): string
    {
        if (!$this->failClosure) {
            $search = array_merge([':attribute'], array_map(static function ($item) {
                return ':' . $item;
            }, array_keys($this->parameters)));
            $replace = array_merge([$attribute], $this->parameters);

            return str_replace(
                $search,
                $replace,
                $this->message
            );
        }

        $failClosure = $this->failClosure;
        $message = $failClosure($attribute, $value, $this->parameters);

        if (!is_string($message)) {
            throw new RuntimeException('FailClosure returned not string');
        }

        return $message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}