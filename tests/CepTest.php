<?php

namespace A2insights\Laracep\Test;

use A2insights\Laracep\Cep;

class CepTest extends TestCase
{
    public function testGet()
    {
        $address = Cep::get('66650404');

        $this->assertTrue($address->bairro === 'Coqueiro');
    }
}
