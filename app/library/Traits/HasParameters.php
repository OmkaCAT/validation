<?php

namespace Validation\Traits;

use InvalidArgumentException;
use Validation\Helpers\Arr;

trait HasParameters
{
    protected array $parameters = [];

    public function addParameter(string $key, mixed $value): self
    {
        $this->parameters[$key] = $value;
        return $this;
    }

    public function getParameter(string $key)
    {
        $parameter = Arr::get($this->parameters, $key);

        if (!$parameter) {
            throw new InvalidArgumentException('Not found parameter: ' . $key);
        }

        return $parameter;
    }

    public function setParameters(array $parameters): self
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}