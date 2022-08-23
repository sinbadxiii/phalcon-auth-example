<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '1993',
        'dbname'      => 'auth-test',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/Controllers/',

        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'securityDir'    => BASE_PATH . '/Security/',
        'baseUri'        => '/',
    ],
    'app' => [
        'key' => 'd!fdsfs#f3123433ff33fF#FwfSAef3f@#F@#F23F@#faef'
    ],
    'auth' => [
        'defaults' => [
            'guard' => 'web'
        ],

        'guards' => [
            'web' => [
                'driver' => 'session',
                'provider' => 'users',
            ],
        ],
        'providers' => [
            'users' => [
                'adapter' => 'model',
                'model'  => App\Models\User::class,
//                'adapter' => 'memory',
//                'data'   => [
//                    0 => ["id" => 0, "name" => "admin", "username" => "admin", 'password' => 'admin', "email" => "admin@admin.ru"],
//                    1 => ["id" => 1, "name" => "admin1","username" => "admin1", 'password' => 'admin1', "email" => "admin1@admin.ru"],
//                ],
//                'model'  => App\Models\UserSimple::class,
//
//                'adapter' => 'stream',
//                'src'   => __DIR__ . "/users.json",
//                'model'  => App\Models\UserSimple::class,
            ],
        ]
    ],
    'cache' => [
        'default' => 'redis',
        'options' => [
            'options' => [
                'defaultSerializer' => 'Json',
                'scheme' => 'tcp',
                'host'   => '127.0.0.1',
                'port'   => 6379,
                'lifetime' => 3600,
            ],
        ]
    ]
]);
