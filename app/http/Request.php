<?php

namespace Http;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request extends SymfonyRequest
{
    public function all(): array
    {
        $method = $this->server->get('REQUEST_METHOD', 'GET');

        return in_array($method, ['GET', 'HEAD']) ? $this->query->all() : $this->request->all();
    }
}