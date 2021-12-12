<?php

namespace CepRepository\Repositories;

use CepRepository\Clients\WEBMANIAClient;

class WEBMANIARepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(WEBMANIAClient::class);
    }

    public function transform($data): array
    {
        return [
            'cep' => $data->cep,
            'estado' => $data->uf,
            'municipio' => $data->cidade,
            'bairro' => $data->bairro,
            'logradouro' => $data->endereco,
        ];
    }
}
