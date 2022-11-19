<?php

namespace A2insights\Laracep\Repositories;

use A2insights\Laracep\Clients\VIAClient;

class VIARepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(VIAClient::class);
    }

    public function transform($data): array
    {
        return [
            'cep' => $data->cep,
            'estado' => $data->uf,
            'municipio' => $data->localidade,
            'bairro' => $data->bairro,
            'logradouro' => $data->logradouro,
        ];
    }
}
