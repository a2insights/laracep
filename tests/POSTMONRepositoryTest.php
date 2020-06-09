<?php

namespace Atiladanvi\CepRepository\Tests;

use Atiladanvi\CepRepository\Repositories\CepPOSTMONRepository;
use PHPUnit\Framework\TestCase;

class POSTMONRepositoryTest extends TestCase
{
    private $address;

    protected function setUp() : void
    {
        $postmonRepository =  app(CepPOSTMONRepository::class);
        $this->address = $postmonRepository->get(66911030);
    }

    public function test_get() : void
    {
        $this->assertTrue($this->address['bairro'] === 'Maracajá (Mosqueiro)');
    }
}
