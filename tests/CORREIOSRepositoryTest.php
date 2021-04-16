<?php

namespace Atiladanvi\CepRepository\Tests;

use Atiladanvi\CepRepository\Repositories\CepCORREIROSRepository;

class CORREIOSRepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $correioRepository =  app(CepCORREIROSRepository::class);
        $address = $correioRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
