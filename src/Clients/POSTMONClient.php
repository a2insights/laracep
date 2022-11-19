<?php

namespace A2insights\Laracep\Clients;

class POSTMONClient extends GuzzleClient
{
    protected $baseUri = 'https://api.postmon.com.br/v1/cep/';
}
