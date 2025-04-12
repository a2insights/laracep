<?php

namespace A2insights\Laracep\Contracts;

interface CepHandlerInterface
{
    public function setNext(CepHandlerInterface $handler): CepHandlerInterface;
    public function handle(string $cep): ?array;
}
