<?php

namespace A2insights\Laracep\Clients;

class POSTMONClient extends GuzzleClient
{
    protected string $baseUri = 'https://api.postmon.com.br/v1/cep/';
}
