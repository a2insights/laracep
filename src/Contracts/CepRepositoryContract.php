<?php

namespace A2insights\Laracep\Contracts;

use A2insights\Laracep\Address;

interface CepRepositoryContract
{
   public function get(string $cep): ?Address;
}
