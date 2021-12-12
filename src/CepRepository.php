<?php

namespace CepRepository;

use CepRepository\Repositories\CORREIOSRepository;
use Illuminate\Support\Str;

/**
 * Class CepRepository
 * @package CepRepository
 */
class CepRepository
{
    /**
     * @param $cep
     * @return mixed
     */
    public static function get($cep)
    {
        $className = 'CepRepository\\Repositories\\'.Str::upper(config('cep.default')).'Repository';

        $repository = class_exists($className) ? app($className) : app(CORREIOSRepository::class);

        return $repository->get($cep);
    }
}
