<?php

namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Clients\POSTMONClient;
use Atiladanvi\CepRepository\Fractals\POSTMONFractal;

class CepPOSTMONRepository extends CepRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(POSTMONClient::class, POSTMONFractal::class);
    }
}
