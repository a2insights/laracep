<?php

namespace CepRepository\Contracts;

use CepRepository\Address;

interface Transformable
{
    public function transform(object $data): array;
}
