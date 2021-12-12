<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Package config
     |--------------------------------------------------------------------------
     |
     | Here you can found the many possibilities to change and improve this package
     | behavior. Feel free to set any variable
     |
    */

    /*
    |--------------------------------------------------------------------------
    | Default Service to resolve
    |--------------------------------------------------------------------------
    |
    | Here you can set de values: ['correios', 'postmon', 'via', 'webmanya', 'ceplar']
    |
   */
    'default' => env('CEP_SERVICES_DEFAULT', 'correios'),


    /*
     |--------------------------------------------------------------------------
     | Private Services configurations
     |--------------------------------------------------------------------------
     |
     | Here you can config some private services
     |
    */

    'private_services' => [

        /*
         |--------------------------------------------------------------------------
         | Private Services configurations
         |--------------------------------------------------------------------------
         |
         | Here you can active or disable all private services
         |
        */
        'enable' => (bool) env('CEP_SERVICES_PRIVATE', false),

        /*
         |--------------------------------------------------------------------------
         | Services Configurations and Credentials
         |--------------------------------------------------------------------------
         |
         | Some services need keys to can access resource in web.
         | Config this if you only need that
         |
        */

        /*
         |--------------------------------------------------------------------------
         | WEBMANIA https://webmaniabr.com
         |--------------------------------------------------------------------------
         |
         | This service can help you find easy and fast address
         | Many people work in this service to updated de addresses
         | You can get a credentials here: https://webmaniabr.com/docs/rest-api-cep-ibge/
         |
        */

        'webmania' => [
           'active' => env('CEP_SERVICES_WEBMANIA'),
           'credentials' => [
               'app_key' => env('CEP_SERVICES_WEBMANIA_KEY'),
               'app_secret' => env('CEP_SERVICES_WEBMANIA_SECRET'),
           ]
        ]
    ]
];
