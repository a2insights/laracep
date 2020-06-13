<?php

namespace Atiladanvi\CepRepository\Tests;

abstract  class TestCase extends  \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getEnvironmentSetUp($app)
    {
        if (file_exists(__DIR__ . '/../.env')) {
            \Dotenv\Dotenv::createImmutable(__DIR__ . '../..' )->load();
        }

        $app['config']->set([
            'cep.private_services.enable' => (bool) env('CEP_SERVICES_PRIVATE', false),
            'cep.private_services.webmania' => [
                'active' => env('CEP_SERVICES_WEBMANIA'),
                'credentials' => [
                    'app_key' => env('CEP_SERVICES_WEBMANIA_KEY'),
                    'app_secret' => env('CEP_SERVICES_WEBMANIA_SECRET'),
                ]
            ]
        ]);
    }
}
