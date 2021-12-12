<?php

namespace CepRepository\Handlers;

use CepRepository\Contracts\HandlerContract;

abstract class AbstractHandler implements HandlerContract
{
    private $next;

    protected $repository;

    public function next(HandlerContract $handler): HandlerContract
    {
        $this->next = $handler;

        return $handler;
    }

    public function handle(string $request): ?object
    {
        $address = app($this->repository)->get($request);

        if (!$address) {
            return $this->next->handle($request);
        }

        return $address;
    }
}
