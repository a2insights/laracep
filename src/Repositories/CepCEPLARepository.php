<?php

namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Clients\CEPLAClient;

class CepCEPLARepository extends CepRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(CEPLAClient::class);
    }

    public function transform($data): array
    {
        return [
            'cep' => $data->cep,
            'estado' => $data->uf,
            'municipio' => $data->cidade,
            'bairro' => $data->bairro,
            'logradouro' => $data->logradouro,
        ];
    }
}
