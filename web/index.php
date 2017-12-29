<?php
declare(strict_types=1);

function show($message = '', $die = true)
{
    echo '<pre>';
    var_dump($message);
    echo '<pre>';
    $die && die;
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../common/config/bootstrap.php');

//根据模块加载配置
if (defined('YII_BACKEND')) {
    $moduleConfig = require(__DIR__ . '/../backend/config/main.php');
} else {
    $moduleConfig = require(__DIR__ . '/../frontend/config/main.php');
}


$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../common/config/main.php'),
    $moduleConfig
);

//prod模式禁用debug和gii
if (!YII_ENV_PROD) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

(new yii\web\Application($config))->run();
