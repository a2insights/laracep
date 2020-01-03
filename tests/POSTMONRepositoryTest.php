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
     * repository
     *
     * @var
     */
    private $postmonRepository;

    /**
     * set up
     */
    protected function setUp()
    {
        $this->postmonRepository =  app(CepPOSTMONRepository::class);
    }

    /**
     * test get cep
     */
    public function test_get()
    {
        $this->assertTrue($this->postmonRepository->get(66911030)->bairro === 'Maracajá (Mosqueiro)');
    }
}
