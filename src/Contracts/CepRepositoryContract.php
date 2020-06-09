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
     * @return array
     */
    public function get(string $cep);
}
