<?php

namespace A2insights\Laracep\Contracts;

use A2insights\Laracep\Address;

/**
 * Interface CepContract
 * @package namespace A2insights\Laracep\Contracts
 */
interface CepRepositoryContract
{
    /**
     * @param string $cep
     * @return ?Address
     */
    public function get(string $cep): ?Address;
}
