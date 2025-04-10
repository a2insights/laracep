<?php

namespace A2insights\Laracep\Contracts;

interface Transformable
{
    public function transform(array $data): array;
}
