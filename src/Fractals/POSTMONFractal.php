<?php


namespace Atiladanvi\CepRepository\Fractals;


use Atiladanvi\CepRepository\Contracts\FractalContract;

class POSTMONFractal extends FractalAbstract implements FractalContract
{

    /**
     * Transform the resource into an array.
     *
     * @param $address
     * @return array
     */
    public function transform($address)
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
