<?php

namespace Atiladanvi\CepRepository\Clients;

class POSTMONClient extends GuzzleClient
{
    protected $baseUri = 'https://api.postmon.com.br/v1/cep/';
}
