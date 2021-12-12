<?php

namespace CepRepository\Contracts;

use CepRepository\Address;

/**
 * Interface CepRepositoryContract
 * @package CepRepository\Contracts
 */
interface CepRepositoryContract
{
    /**
     * @param string $cep
     * @return ?Address
     */
    public function get(string $cep): ?Address;
}
