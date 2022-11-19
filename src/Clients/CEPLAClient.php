<?php

namespace A2insights\Laracep\Clients;

class CEPLAClient extends GuzzleClient
{
    protected $baseUri = 'http://cep.la/api/';
}
