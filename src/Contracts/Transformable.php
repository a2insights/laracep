<?php

namespace Cep\Contracts;

use Cep\Address;

interface Transformable
{
    public function transform(object $data): array;
}
