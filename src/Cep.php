<?php

namespace A2insights\Laracep;

use A2insights\Laracep\Repositories\CORREIOSRepository;
use A2insights\Laracep\Repositories\VIARepository;
use Illuminate\Support\Str;

class Cep
{
    public static function get($cep): ?Address
    {
        $className = 'A2insights\\LaraCep\\Repositories\\'.Str::upper(config('cep.default')).'Repository';

        $repository = class_exists($className) ? app($className) : app(VIARepository::class);

        return $repository->get($cep);
    }
}
