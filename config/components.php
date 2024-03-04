<?php

$db = require __DIR__ . '/db.php';

return [
    'request' => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => '_48TxQWvaHGowho_SIh_Nc6ML5gEReqx',
    ],
    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],
    'user' => [
        'identityClass' => 'app\modules\auth\models\User',
        'enableAutoLogin' => true,
    ],
    'errorHandler' => [
        'errorAction' => 'ship/default/error',
    ],
    'mailer' => [
        'class'    => \yii\symfonymailer\Mailer::class,
        'viewPath' => '@app/mail',
        // send all mails to a file by default.
        'useFileTransport' => true,
    ],
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets'    => [
            [
                'class'  => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
    'db' => $db,
    'urlManager' => [
        'enablePrettyUrl'     => true,
        'showScriptName'      => false,
        'enableStrictParsing' => true,
        'rules'               => $routes,
    ],
];