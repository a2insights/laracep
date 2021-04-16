<?php

namespace Atiladanvi\CepRepository\Contracts;

use Atiladanvi\CepRepository\Address;

interface Transformable
{
    public function transform(object $data): array;
}
