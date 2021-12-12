<?php

namespace CepRepository\Repositories;

use CepRepository\Clients\VIAClient;

class CepVIARepository extends CepRepositoryAbstract
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
