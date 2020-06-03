<?php

namespace Atiladanvi\CepRepository\Tests;

use Atiladanvi\CepRepository\Repositories\CepPOSTMONRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class POSTMONRepositoryTest
 * @package Atiladanvi\CepRepository\Tests
 */
class POSTMONRepositoryTest extends TestCase
{

    /**
     * address
     *
     * @var mixed
     */
    private $address;

    /**
     * set up
     */
    protected function setUp() : void
    {
        $postmonRepository =  app(CepPOSTMONRepository::class);
        $this->address = $postmonRepository->get(66911030);
    }

    /**
     * test get cep
     */
    public function test_get() : void
    {
        $this->assertTrue($this->address['bairro'] === 'Maracajá (Mosqueiro)');
    }
}
