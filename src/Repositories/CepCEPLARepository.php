<?php

namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Clients\CEPLAClient;
use Atiladanvi\CepRepository\Fractals\CEPLAFractal;

class CepCEPLARepository extends CepRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(CEPLAClient::class, CEPLAFractal::class);
    }
}
