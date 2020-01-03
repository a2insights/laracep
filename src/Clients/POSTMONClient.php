<?php

namespace Atiladanvi\CepRepository\Clients;

/**
 * Class POSTMONClient
 * @package Atiladanvi\CepRepository\Clients
 */
class POSTMONClient extends GuzzleClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://api.postmon.com.br/v1/cep/';
}
