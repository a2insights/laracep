<?php

namespace A2insights\Laracep;

class Address
{
    public function __construct(
        public string $cep,
        public string $estado,
        public string $municipio,
        public string $bairro,
        public string $logradouro
    ) {
    }
}
