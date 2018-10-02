<?php
return [
    'rootDir' => __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR,
    'DS' => DIRECTORY_SEPARATOR,
    'templatesDir' => __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . 'templates/',
    'defaultController' => 'product',
    'controllerNamespace' => "app\\controllers",
    'vendorDir' => __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "vendor/",
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'brand',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => \app\services\Request::class,
        ],
        'templateRenderer' => [
            'class' => \app\services\TemplateRenderer::class
        ]
    ]
];


