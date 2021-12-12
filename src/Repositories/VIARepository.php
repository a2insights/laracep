<?php

namespace Cep\Repositories;

use Cep\Clients\VIAClient;

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
