<?php

namespace Atiladanvi\CepRepository\Resources;

use Atiladanvi\CepRepository\Contracts\Transformable;
use League\Fractal\TransformerAbstract;

class AddressTransformer extends TransformerAbstract implements Transformable
{
    public function transform(object $data): array
    {
        return [
            'cep' => $data->cep,
            'estado' => $data->estado,
            'municipio' => $data->municipio,
            'bairro' => $data->bairro,
            'logradouro' => $data->logradouro,
        ];
    }
}
