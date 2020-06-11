<?php

namespace Atiladanvi\CepRepository\Tests;

use Atiladanvi\CepRepository\Repositories\CepPOSTMONRepository;
use PHPUnit\Framework\TestCase;

class CEPLARepositoryTest extends TestCase
{
    private $address;

    protected function setUp() : void
    {
        $ceplaRepository =  app(CepPOSTMONRepository::class);
        $this->address = $ceplaRepository->get(66911030);
    }

    public function test_get() : void
    {
        $this->assertTrue($this->address['bairro'] === 'Maracajá (Mosqueiro)');
    }
}
