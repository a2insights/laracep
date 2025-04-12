<?php

namespace A2insights\Laracep\Clients;

class ViaClient extends GuzzleClient
{
    protected string $baseUri = 'https://viacep.com.br/ws/';

    public function getUri(): string
    {
        return "$this->uri/json";
    }
}
