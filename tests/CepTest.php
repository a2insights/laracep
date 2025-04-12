<?php


namespace A2insights\Laracep\Test;

use A2insights\Laracep\Cep;

class CepTest extends TestCase
{
    public function test_get()
    {
        $address = Cep::get('66911030');

        dd($address);
    }
}
