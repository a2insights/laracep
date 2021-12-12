<?php

namespace CepRepository;

use CepRepository\Repositories\CepPOSTMONRepository;

/**
 * Class CepRepository
 * @package CepRepository
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
