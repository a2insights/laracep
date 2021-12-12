<?php

namespace CepRepository\Tests;

use CepRepository\Repositories\CepPOSTMONRepository;

class CEPLARepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $ceplaRepository =  app(CepPOSTMONRepository::class);
        $address = $ceplaRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
