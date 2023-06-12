<?php

return [
    'migration_dirs' => [
        'first' => __DIR__ . '/database/migrations',
    ],
    'environments' => [
        'local' => [
            'adapter' => 'mysql',
            'host' => 'mysql',
            'port' => 3306,
            'username' => 'root',
            'password' => 'root',
            'db_name' => 'assignment_db',
            'charset' => 'utf8mb4',
        ],
        'production' => [
            'adapter' => 'mysql',
            'host' => 'production_host',
            'port' => 3306,
            'username' => 'user',
            'password' => 'pass',
            'db_name' => 'my_production_db',
            'charset' => 'utf8mb4',
        ],
    ],
    'default_environment' => 'local',
    'log_table_name' => 'phoenix_log',
];