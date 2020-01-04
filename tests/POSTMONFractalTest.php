<?php

namespace Atiladanvi\CepRepository\Tests;

use Atiladanvi\CepRepository\Fractals\POSTMONFractal;
use Atiladanvi\CepRepository\Repositories\CepPOSTMONRepository;
use PHPUnit\Framework\TestCase;
use League\Fractal;

/**
 * Class POSTMONFractalTest
 * @package Atiladanvi\CepRepository\Tests
 */
class POSTMONFractalTest extends TestCase
{

    /**
     * repository
     *
     * @var
     */
    private $postmonRepository;

    /**
     * address
     *
     * @var
     */
    private $address;

    /**
     * set up
     */
    protected function setUp()
    {
        $this->postmonRepository =  app(CepPOSTMONRepository::class);
        $this->address = $this->postmonRepository->get(66911030);
    }

    /**
     * test transform
     */
    public function test_transform()
    {
       $transformer = new Fractal\Resource\Item($this->address, new POSTMONFractal);

       $this->assertNotNull($transformer->getData());
    }
}
