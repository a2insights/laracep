<?php


namespace Atiladanvi\CepRepository\Repositories;


use Atiladanvi\CepRepository\Clients\POSTMONClient;
use Atiladanvi\CepRepository\Fractals\POSTMONFractal;

/**
 * Class CepPOSTMONRepository
 * @package Atiladanvi\CepRepository\Repositories
 */
class CepPOSTMONRepository extends CepRepositoryAbstract
{

    /**
     * CepPOSTMONRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(POSTMONClient::class, POSTMONFractal::class);
    }
}
