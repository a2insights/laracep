<?php

namespace Cep;

/**
 * Class AddressFactory
 * @package Cep
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
