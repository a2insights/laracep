<?php

namespace Cep\Tests;

use Cep\Cep;

class CepTest  extends TestCase
{
    public function testGet()
    {
        $address = Cep::get('66650404');

        $this->assertTrue($address->bairro === 'Coqueiro');
    }
}
