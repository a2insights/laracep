<?php

namespace Atiladanvi\CepRepository;

/**
 * Class AddressFactory
 * @package Atiladanvi\CepRepository
 */
class AddressFactory
{
    /**
     * Create an Address object
     *
     * @param $adress
     * @return Address
     */
    public static function create($adress): Address
    {
        return new Address(
            $adress->cep,
            $adress->estado,
            $adress->municipio,
            $adress->bairro,
            $adress->logradouro
        );
    }
}
