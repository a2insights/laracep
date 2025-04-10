<?php

namespace A2insights\Laracep\Clients;

class WEBMANIAClient extends GuzzleClient
{
    protected string $baseUri = 'https://webmaniabr.com/api/1/cep/';

    public function getQuery(): array
    {
        return [
            'app_key' => config('cep.private_services.webmania.credentials.app_key'),
            'app_secret' => config('cep.private_services.webmania.credentials.app_secret')
        ];
    }
}
