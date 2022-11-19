<?php

namespace A2insights\Laracep\Test;

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
            'laracep.default' => env('LARACEP_SERVICES_DEFAULT', 'correios'),
            'laracep.private_services.enable' => (bool) env('LARACEP_SERVICES_PRIVATE', false),
            'laracep.private_services.webmania' => [
                'active' => env('LARACEP_SERVICES_WEBMANIA'),
                'credentials' => [
                    'app_key' => env('LARACEP_SERVICES_WEBMANIA_KEY'),
                    'app_secret' => env('LARACEP_SERVICES_WEBMANIA_SECRET'),
                ]
            ]
        ]);
    }
}
