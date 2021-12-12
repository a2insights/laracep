<?php

namespace Cep;

use Cep\Repositories\CORREIOSRepository;
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
        $className = 'Cep\\Repositories\\'.Str::upper(config('cep.default')).'Repository';

        $repository = class_exists($className) ? app($className) : app(CORREIOSRepository::class);

        return $repository->get($cep);
    }
}
