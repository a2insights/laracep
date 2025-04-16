<?php

namespace A2insights\Laracep\Repositories;

use A2insights\Laracep\Clients\ViaClient;

final class ViaRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(ViaClient::class);
    }

    public function transform(array $data): array
    {
        return [
            'cep' => $data['cep'],
            'estado' => $data['uf'],
            'municipio' => $data['cidade'],
            'bairro' => $data['bairro'],
            'logradouro' => $data['logradouro'],
        ];
    }
}
