<?php

namespace Atiladanvi\CepRepository\Contracts;

use Atiladanvi\CepRepository\Address;

/**
 * Interface CepRepositoryContract
 * @package Atiladanvi\CepRepository\Contracts
 */
interface CepRepositoryContract
{
    /**
     * @param string $cep
     * @return ?Address
     */
    public function get(string $cep): ?Address;
}
