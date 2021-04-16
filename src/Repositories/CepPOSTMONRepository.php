<?php

namespace Atiladanvi\CepRepository\Repositories;

use Atiladanvi\CepRepository\Clients\POSTMONClient;

class CepPOSTMONRepository extends CepRepositoryAbstract
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
