<?php

namespace CepRepository\Tests;

use CepRepository\Repositories\CepWEBMANIARepository;

class WEBMANIARepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $viaRepository =  app(CepWEBMANIARepository::class);
        $address = $viaRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
