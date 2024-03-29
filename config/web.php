<?php

$params     = require __DIR__ . '/params.php';
$components = require __DIR__ . '/components.php';

$config = [
    'id' => 'basic',
    'basePath'  => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => $components,
    'params'     => $params,
    'modules' => [
        'blog' => [
            'class' => 'app\modules\blog\Module',
        ],
        'ship' => [
            'class' => 'app\modules\ship\Module',
        ],
        'auth' => [
            'class' => 'app\modules\auth\Module',
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'bootstrap' => [
        'app\modules\ship\Bootstrap',
        'app\modules\auth\Bootstrap',
        'app\modules\blog\Bootstrap',
        'app\modules\admin\Bootstrap',
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
