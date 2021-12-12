<?php

namespace CepRepository\Tests;

use CepRepository\Repositories\POSTMONRepository;

class POSTMONRepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $postmonRepository =  app(POSTMONRepository::class);
        $address = $postmonRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
