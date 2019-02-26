<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'language' => 'ru',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
   /*  'i18n' => [
        'translations' => [
            'app' => [
                'class' => 'yii\i18n\PhpMessageSource:class',
                'basePath' => '@app\messages',
            ]
        ]
    ], */
    'bootstrap' => ['log', 'eventController', 'bootstrap'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@img' => '@app/web/img',
    ],
    'components' => [
        'bootstrap' => [
            'class' => 'app\components\Bootstrap',
        ],

        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                    'basePath' => "@app/messages"
                ]
            ]
        ],
        'eventController' => [
            'class' => 'app\components\EventController',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'nwCNzQ6jUs0B5DdijQWbq0iS7lZyeCzH',
        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'yii2.php',
                'port' => 6379,
                'database' => 0,
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,        
        'urlManager' => [
            'enablePrettyUrl' => true, 
            'showScriptName' => false, 
            'rules' => [
                'tasks' => 'tasks/index',
                'tasks/<id>' => 'tasks/one',
                'tasks/addcomment' => 'tasks/add-comment',
            ],
        ],       
    ],
    'params' => $params,
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
