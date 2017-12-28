<?php
$baseDir = dirname(dirname(__DIR__));

$database = include($baseDir . '/config/db.php');
$mail = include($baseDir . '/config/mail.php');

return [
    'vendorPath' => $baseDir . '/vendor',
    'language' => 'zh_CN',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => $database,
        'user' => [
            'identityClass' => 'common\models\MembersModel',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-app', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the app
            'name' => 'blog',
        ],
        //语言配置
//        'i18n' => [
//            'translations' => [
//                'goods' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => '@common/language',
//                    'fileMap' => [
//                        'goods' => 'goods.php',
//                    ],
//                ],
//            ],
//        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'assetManager' => [
            'bundles' => false,
        ],
    ],
];
