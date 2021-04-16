<?php

namespace Atiladanvi\CepRepository\Contracts;

/**
 * Interface HandlerContract
 * @package Atiladanvi\CepRepository\Contracts
 */
interface HandlerContract
{
    /**
     * @param HandlerContract $handler
     * @return HandlerContract
     */
    public function next(HandlerContract $handler): HandlerContract;

    /**
     * @param string $request
     * @return object|null
     */
    public function handle(string $request): ?object;
}
