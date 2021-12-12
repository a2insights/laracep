<?php

namespace CepRepository\Repositories;

use CepRepository\Clients\POSTMONClient;

class POSTMONRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(POSTMONClient::class);
    }

    public function transform($address): array
    {
        return [
            'cep' => $address->cep,
            'estado' => $address->estado_info->nome,
            'municipio' => $address->cidade,
            'bairro' => $address->bairro,
            'logradouro' => $address->logradouro,
        ];
    }
}
