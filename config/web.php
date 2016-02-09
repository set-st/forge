<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name'=>'Forge',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'n05-rj-8OyylKrh0OW4A88uFjrZrYe6R',
            'baseUrl' => '',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                //userblogs
                '/blog/user_<userid:\d+>' => 'blog/userblog',
                '/blog/user_<userid:\d+>/<catid:\d+>' => 'blog/userblog',
                '/blog/user_<userid:\d+>/<catid:\d+>/read_<viewid:\d+>' => 'blog/view',
                //globalblogs
                '/blog' => 'blog/index',
                '/blog/<catid:\d+>' => 'blog/userblog',
                '/blog/<catid:\d+>/read_<viewid:\d+>' => 'blog/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<action>'=>'site/<action>',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            //'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            //'class' => 'yii\rbac\PhpManager',
        ],
        'authClientCollection' => [
            'class' => yii\authclient\Collection::className(),
            'clients' => [
                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
                'twitter' => [
                    'class'          => 'dektrium\user\clients\Twitter',
                    'consumerKey'    => 'CONSUMER_KEY',
                    'consumerSecret' => 'CONSUMER_SECRET',
                ],
                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
                'yandex' => [
                    'class'        => 'dektrium\user\clients\Yandex',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET'
                ],
                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ]
            ],
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['Stanislav'],
            'controllerMap' => [
                'admin' => [
                    'class' => 'dektrium\user\controllers\AdminController',
                    'layout' => '@app/views\layouts\user\admin',
                ],
                'settings' => [
                    'class' => 'dektrium\user\controllers\SettingsController',
                    'layout' => '@app/views\layouts\user\settings',
                ],
                'registration' => [
                    'class' => 'dektrium\user\controllers\RegistrationController',
                    'layout' => '@app/views\layouts\user\login',
                ],
                'recovery' => [
                    'class' => 'dektrium\user\controllers\RecoveryController',
                    'layout' => '@app/views\layouts\user\login',
                ],
                'security' => [
                    'class' => 'dektrium\user\controllers\SecurityController',
                    'layout' => '@app/views\layouts\user\login',
                ],
            ],
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
            'controllerMap' => [
                'role' => [
                    'class' => 'dektrium\rbac\controllers\RoleController',
                    'layout' => '@app/views\layouts\user\admin',
                ],
                'item' => [
                    'class' => 'dektrium\rbac\controllers\ItemController',
                    'layout' => '@app/views\layouts\user\admin',
                ],
                'permission' => [
                    'class' => 'dektrium\rbac\controllers\PermissionController',
                    'layout' => '@app/views\layouts\user\admin',
                ],
                'assignment' => [
                    'class' => 'dektrium\user\controllers\AssignmentController',
                    'layout' => '@app/views\layouts\user\admin',
                ],
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
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
