<?php

namespace A2insights\Laracep;

use Illuminate\Support\Facades\Facade;

/**
 * Class CepFacade
 * @package Cep
 */
class CepFacade extends Facade
{
    /**
     * Get the registered name for facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cep';
    }
}
