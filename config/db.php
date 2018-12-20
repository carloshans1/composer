<?php

/* forma mais segura */

return [
    'default_connection' => [
        'driver' => getenv('DB_DRIVER'),
        'host' => getenv('DB_HOST'),
        'database' => getenv('DB_DATABASE'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci'
    ]
];

    /* Forma simples de acesso ao banco de dados
    'development' => [
     'driver' => 'mysql',
     'host' => 'localhost',
     'database' => 'sonfinancas',
     'username' => 'root',
     'password' => 'mcmoraisze',
     'charset' => 'utf8',
     'collation' => 'utf8_unicode_ci'
    ]
    */
