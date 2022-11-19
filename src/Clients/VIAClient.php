<?php

namespace A2insights\Laracep\Clients;

class VIAClient extends GuzzleClient
{
    protected $baseUri = 'https://viacep.com.br/ws/';

    public function getUri()
    {
        return "$this->cep/json";
    }
}
