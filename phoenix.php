<?php
return [
    'log_table_name' => 'phoenix_log',
    'migration_dirs' => [
        'first' => __DIR__ . '/database/dbmigrations/homolog_dir',
        'second' => __DIR__ . '/database/dbmigrations/product_dir',
    ],
    'environments' => [
        'local' => [
            'adapter' => 'mysql',
            'version' => '8.0.23', // optional - if not set it is requested from server 
            'host' => 'localhost',
            'port' => 3306, // optional
            'username' => 'root',
            'password' => '',
            'db_name' => 'test_db',
            'charset' => 'utf8', // optional
        ],
        'production' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'db_name' => 'test_production_db',
            'charset' => 'utf8',
        ],
    ],
    'default_environment ' => 'local',
];
