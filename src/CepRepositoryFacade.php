<?php

namespace CepRepository;

use Illuminate\Support\Facades\Facade;

/**
 * Class CepRepositoryFacade
 * @package CepRepository
 */
class CepRepositoryFacade extends Facade
{
    /**
     * Get the registered name for facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cep-repository';
    }
}
