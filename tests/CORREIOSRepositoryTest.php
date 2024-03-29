<?php

namespace A2insights\Laracep\Test;

use A2insights\Laracep\Repositories\CORREIOSRepository;

class CORREIOSRepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $correioRepository = app(CORREIOSRepository::class);
        $address = $correioRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
