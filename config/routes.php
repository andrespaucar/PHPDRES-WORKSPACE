<?php

return [
    /*
    |
    |   https://github.com/izniburak/php-router/wiki/2.-Getting-Started#other-settings
    */
    'config' => [
        // 'base_folder' =>  __DIR__."/../",
        'paths' => [
            'controllers' => '../app/controllers',
            'middlewares' => '../app/middlewares',
        ],

        'namespaces' => [
            'controllers' => 'App\Controllers',
            'middlewares' => 'App\Middlewares',
        ],
    ]
];