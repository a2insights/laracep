<?php

namespace CepRepository\Tests;

use CepRepository\Repositories\WEBMANIARepository;

class WEBMANIARepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $viaRepository =  app(WEBMANIARepository::class);
        $address = $viaRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
