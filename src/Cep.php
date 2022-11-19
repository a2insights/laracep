<?php

namespace A2insights\Laracep;

use A2insights\Laracep\Repositories\CORREIOSRepository;
use Illuminate\Support\Str;

/**
 * Class Cep
 * @package Cep
 */
class Cep
{
    /**
     * @param $cep
     * @return mixed
     */
    public static function get($cep)
    {
        $className = 'A2insights\\LaraCep\\Repositories\\'.Str::upper(config('cep.default')).'Repository';

        $repository = class_exists($className) ? app($className) : app(CORREIOSRepository::class);

        return $repository->get($cep);
    }
}
