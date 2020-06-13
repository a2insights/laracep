<?php

namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Clients\WEBMANIAClient;
use Atiladanvi\CepRepository\Fractals\WEBMANIAFractal;

class CepWEBMANIARepository extends CepRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(WEBMANIAClient::class, WEBMANIAFractal::class);
    }
}
