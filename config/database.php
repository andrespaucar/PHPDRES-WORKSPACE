<?php

return [

    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'mysql' =>[
            'driver'    => 'mysql',
            'host'      => env('DB_HOST','127.0.0.1'),
            'database'  => env('DB_DATABASE','mysistem'),
            'username'  => env('DB_USERNAME','root'),
            'password'  => env('DB_PASSWORD',''),
            'port'      => env('DB_PORT', '3306'),
            'charset'   => 'utf8mb4', // utf8mb4 | utf8
            'collation' => 'utf8mb4_unicode_ci',//utf8mb4_unicode_ci | utf8_unicode_ci
            'prefix'    => '',
            'prefix_indexes' => true,
            // 'strict' => true,
            // 'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        // 'sqlsrv' => [
        //     'driver' => 'sqlsrv',
        //     'url' => env('DATABASE_URL'),
        //     'host' => env('DB_HOST', 'localhost'),
        //     'port' => env('DB_PORT', '1433'),
        //     'database' => env('DB_DATABASE', 'forge'),
        //     'username' => env('DB_USERNAME', 'forge'),
        //     'password' => env('DB_PASSWORD', ''),
        //     'charset' => 'utf8',
        //     'prefix' => '',
        //     'prefix_indexes' => true,
        // ],

        // 'sqlite' => [
        //     'driver' => 'sqlite',
        //     'url' => env('DATABASE_URL'),
        //     'database' => env('DB_DATABASE', database_path('database.sqlite')),
        //     'prefix' => '',
        //     'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        // ],
    ]
];