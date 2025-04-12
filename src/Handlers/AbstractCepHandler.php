<?php

namespace A2insights\Laracep\Handlers;

use A2insights\Laracep\Contracts\CepHandlerInterface;

abstract class AbstractCepHandler implements CepHandlerInterface
{
    private ?CepHandlerInterface $nextHandler = null;

    public function setNext(CepHandlerInterface $handler): CepHandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(string $cep): ?array
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($cep);
        }

        return null;
    }

    protected function tryNext(string $cep): ?array
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($cep);
        }

        return null;
    }
}
