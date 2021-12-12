<?php

namespace Cep\Clients;

class WEBMANIAClient extends GuzzleClient
{
    protected $baseUri = 'https://webmaniabr.com/api/1/cep/';

    public function getQuery()
    {
        return [
            'app_key' => config('cep.private_services.webmania.credentials.app_key'),
            'app_secret' => config('cep.private_services.webmania.credentials.app_secret')
        ];
    }
}
