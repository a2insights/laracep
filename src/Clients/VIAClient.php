<?php

namespace Cep\Clients;

class VIAClient extends GuzzleClient
{
    protected $baseUri = 'https://viacep.com.br/ws/';

    public function getUri()
    {
        return "$this->cep/json";
    }
}
