<?php

namespace CepRepository\Tests;

use CepRepository\Repositories\CepPOSTMONRepository;

class POSTMONRepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $postmonRepository =  app(CepPOSTMONRepository::class);
        $address = $postmonRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
