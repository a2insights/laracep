<?php

namespace A2insights\Laracep;

class AddressFactory
{
    public static function create(array $adress): Address
    {
        return new Address(
            $adress['cep'],
            $adress['estado'],
            $adress['municipio'],
            $adress['bairro'],
            $adress['logradouro']
        );
    }
}
