<?php

namespace Atiladanvi\CepRepository\Tests;

use Atiladanvi\CepRepository\Fractals\POSTMONFractal;
use Atiladanvi\CepRepository\Repositories\CepPOSTMONRepository;
use PHPUnit\Framework\TestCase;
use League\Fractal;

class POSTMONFractalTest extends TestCase
{
    private $address;

    protected function setUp(): void
    {
        $postmonRepository =  app(CepPOSTMONRepository::class);
        $this->address = $postmonRepository->get(66911030);
    }

    public function test_transform(): void
    {
       $transformer = new Fractal\Resource\Item($this->address, new POSTMONFractal);

       $this->assertNotNull($transformer->getData());
    }
}
