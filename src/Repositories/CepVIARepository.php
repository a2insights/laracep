<?php

namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Clients\VIAClient;

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
