<?php
use frontend\config\UrlManage;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

$modules = require(__DIR__ . '/modules.php');

return [
    'id' => 'frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'layout' => 'main',
    'defaultRoute' => '/article/default/index',
    'modules' => $modules,
    'components' => [
        'request' => [
            'csrfParam' => 'token',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '_U04PmjLnPY1lGtmLSfqMzkUO7JuJKFd',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
//            'errorView' => '@frontend/views/site/error.php',
//            'exceptionView' => '@frontend/views/site/error.php',
        ],
        'urlManager' => UrlManage::rules(),
    ],
    'params' => $params,
];
