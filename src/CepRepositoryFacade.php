<?php

namespace Atiladanvi\CepRepository;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Atiladanvi\CepRepository\Skeleton\SkeletonClass
 */
class CepRepositoryFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cep-repository';
    }
}
