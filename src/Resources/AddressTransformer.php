<?php

namespace A2insights\Laracep\Resources;

use A2insights\Laracep\Contracts\Transformable;
use League\Fractal\TransformerAbstract;

class AddressTransformer extends TransformerAbstract implements Transformable
{
    public function transform(object $data): array
    {
        return [
            'cep' => (string) $data->cep,
            'estado' => (string) $data->estado,
            'municipio' => (string) $data->municipio,
            'bairro' => (string) $data->bairro,
            'logradouro' => (string) $data->logradouro,
        ];
    }
}
