<?php


namespace A2insights\Laracep\Test;

use A2insights\Laracep\Cep;

class CepTest extends TestCase
{
    public function test_get()
    {
        $address = Cep::get('66911030');

        $this->assertArrayHasKey('cep', $address);
        $this->assertArrayHasKey('estado', $address);
        $this->assertArrayHasKey('uf', $address);
        $this->assertArrayHasKey('ibge', $address);
        $this->assertArrayHasKey('siafi', $address);
        $this->assertArrayHasKey('municipio', $address);
        $this->assertArrayHasKey('bairro', $address);
        $this->assertArrayHasKey('logradouro', $address);
    }
}
