<?php

namespace Atiladanvi\CepRepository\Tests;

use Atiladanvi\CepRepository\Handlers\POSTMONHandler;
use Atiladanvi\CepRepository\Handlers\VIAHandler;

class HandlersTest extends TestCase
{
    public function test_get_adress_by_handler() : void
    {
        $viaHandler = new VIAHandler();
        $postmonHandler = new POSTMONHandler();

        $viaHandler->next($postmonHandler);

        $address = $viaHandler
            ->handle(66911030);

        $this->assertTrue($address['bairro'] === 'Maracajá (Mosqueiro)');
    }
}
