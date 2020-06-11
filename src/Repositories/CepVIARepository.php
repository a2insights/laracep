<?php

namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Clients\VIAClient;
use Atiladanvi\CepRepository\Fractals\VIAFractal;

class CepVIARepository extends CepRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(VIAClient::class, VIAFractal::class);
    }
}
