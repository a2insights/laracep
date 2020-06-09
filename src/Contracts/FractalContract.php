<?php

namespace Atiladanvi\CepRepository\Contracts;

/**
 * Interface FractalContract
 * @package Atiladanvi\CepRepository\Contracts
 */
interface FractalContract
{
    /**
     * @param $address
     * @return mixed
     */
    public function transform($address);
}
