<?php

namespace CepRepository\Tests;

use CepRepository\CepRepository;

class CepRepositoryTest  extends TestCase
{
    public function testGet()
    {
        $address = CepRepository::get('66650404');

        $this->assertTrue($address->bairro === 'Coqueiro');
    }
}
