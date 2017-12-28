<?php
use \frontend\config\UrlManage;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

$modules = require(__DIR__ . '/modules.php');

return [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'defaultRoute' => '/index/index/index',
    'modules' => $modules,
    'components' => [
        'request' => [
            'csrfParam' => 'token',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'rio7fGP853sxb-bAWGFsGEN3UxRStnbQ',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'blog',
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
        ],
//        'urlManager' => [
//            'enablePrettyUrl' => false,
//            'showScriptName' => true,
//            'rules' => [
//            ],
//        ],
    ],
    'params' => $params,
];
