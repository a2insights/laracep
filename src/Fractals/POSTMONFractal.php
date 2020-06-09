<?php

namespace Atiladanvi\CepRepository\Fractals;

use Atiladanvi\CepRepository\Contracts\FractalContract;

class POSTMONFractal extends FractalAbstract implements FractalContract
{
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
