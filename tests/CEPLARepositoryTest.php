<?php

namespace CepRepository\Tests;

use CepRepository\Repositories\POSTMONRepository;

class CEPLARepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $ceplaRepository =  app(POSTMONRepository::class);
        $address = $ceplaRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
