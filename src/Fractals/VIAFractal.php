<?php

namespace Atiladanvi\CepRepository\Fractals;

use Atiladanvi\CepRepository\Contracts\FractalContract;

class VIAFractal extends FractalAbstract implements FractalContract
{
    public function transform($address): array
    {
        return [
            'cep' => $address->cep,
            'estado' => $address->uf,
            'municipio' => $address->localidade,
            'bairro' => $address->bairro,
            'logradouro' => $address->logradouro,
        ];

    }
}
