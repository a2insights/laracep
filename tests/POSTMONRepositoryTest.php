<?php

namespace A2insights\Laracep\Test;

use A2insights\Laracep\Repositories\POSTMONRepository;

class POSTMONRepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $postmonRepository = app(POSTMONRepository::class);
        $address = $postmonRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
