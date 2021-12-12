<?php

namespace CepRepository\Tests;

use CepRepository\Handlers\POSTMONHandler;
use CepRepository\Handlers\VIAHandler;

class HandlersTest extends TestCase
{
    public function test_get_address_by_handler() : void
    {
        $viaHandler = new VIAHandler();
        $postmonHandler = new POSTMONHandler();

        $viaHandler->next($postmonHandler);

        $address = $viaHandler
            ->handle(66911030);

        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
