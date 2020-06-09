<?php

namespace Atiladanvi\CepRepository;

use Atiladanvi\CepRepository\Repositories\CepPOSTMONRepository;

/**
 * Class CepRepository
 * @package Atiladanvi\CepRepository
 */
class CepRepository
{
    /**
     * @param $cep
     * @return mixed
     */
    public static function get($cep)
    {
        $repository = app(CepPOSTMONRepository::class);

        return $repository->get($cep);
    }
}
