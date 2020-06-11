<?php

namespace Atiladanvi\CepRepository\Tests;

use Atiladanvi\CepRepository\Repositories\CepVIARepository;
use PHPUnit\Framework\TestCase;

class VIARepositoryTest extends TestCase
{
    private $address;

    protected function setUp() : void
    {
        $viaRepository =  app(CepVIARepository::class);
        $this->address = $viaRepository->get(66911030);
    }

    public function test_get() : void
    {
        $this->assertTrue($this->address['bairro'] === 'Maracajá (Mosqueiro)');
    }
}
