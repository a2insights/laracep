<?php

namespace A2insights\Laracep\Test;

use A2insights\Laracep\Repositories\WEBMANIARepository;

class WEBMANIARepositoryTest extends TestCase
{
    public function test_get() : void
    {
        if(config('laracep.private_services.webmania.credentials.app_key') === null) {
            $this->markTestSkipped('Webmania API Key not set');
        }

        $viaRepository = app(WEBMANIARepository::class);
        $address = $viaRepository->get(66911030);

        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
