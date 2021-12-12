<?php

namespace Cep\Contracts;

use Cep\Address;

/**
 * Interface CepContract
 * @package Cep\Contracts
 */
interface CepRepositoryContract
{
    /**
     * @param string $cep
     * @return ?Address
     */
    public function get(string $cep): ?Address;
}
