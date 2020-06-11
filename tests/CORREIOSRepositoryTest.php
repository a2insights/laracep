<?php

namespace Atiladanvi\CepRepository\Tests;

use Atiladanvi\CepRepository\Repositories\CepCORREIROSRepository;
use PHPUnit\Framework\TestCase;

class CORREIOSRepositoryTest extends TestCase
{
    private $address;

    protected function setUp() : void
    {
        $correioRepository =  app(CepCORREIROSRepository::class);
        $this->address = $correioRepository->get(66911030);
    }

    public function test_get() : void
    {
        $this->assertTrue($this->address['bairro'] === 'Maracajá (Mosqueiro)');
    }
}
