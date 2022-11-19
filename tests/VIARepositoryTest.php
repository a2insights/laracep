<?php

namespace A2insights\Laracep\Test;

use A2insights\Laracep\Repositories\VIARepository;
use PHPUnit\Framework\TestCase;

class VIARepositoryTest extends TestCase
{
    public function test_get() : void
    {
        $viaRepository = app(VIARepository::class);
        $address = $viaRepository->get(66911030);
        $this->assertTrue($address->bairro === 'Maracajá (Mosqueiro)');
    }
}
