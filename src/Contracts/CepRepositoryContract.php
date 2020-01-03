<?php

namespace Atiladanvi\CepRepository\Contracts;

/**
 * Interface CepRepositoryContract
 * @package Atiladanvi\CepRepository\Contracts
 */
interface CepRepositoryContract
{
    /**
     * @param string $cep
     * @return mixed
     */
    public function get(string $cep);
}
