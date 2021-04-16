<?php

namespace Atiladanvi\CepRepository;

/**
 * Class Address
 * @package Atiladanvi\CepRepository
 */
class Address
{
    /**
     * Cep number
     * @var string
     */
    public $cep;

    /**
     * state name
     * @var string
     */
    public $estado;

    /**
     * city name
     * @var string
     */
    public $municipio;

    /**
     * district name
     * @var string
     */
    public $bairro;

    /**
     * street name
     * @var string
     */
    public $logradouro;

    /**
     * Address constructor
     *
     * @param $cep
     * @param $estado
     * @param $municipio
     * @param $bairro
     * @param $logradouro
     */
    public function __construct($cep, $estado, $municipio, $bairro, $logradouro)
    {
        $this->cep = $cep;
        $this->estado = $estado;
        $this->municipio = $municipio;
        $this->bairro = $bairro;
        $this->logradouro = $logradouro;
    }
}
