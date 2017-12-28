<?php
use yii\helpers\Html;
use vendor\toolkit\Functions\FrontHelper;
/* @var $content */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?> - <?= Yii::$app->params['titleSuffix'] ?></title>
    <meta name="keywords" content="胖子的商城">
    <meta name="description" content="胖子的商城描述信息">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <?= FrontHelper::loadCssWithCDN([
        'blog/dist/css/blog.min.css',
    ]) ?>
    <?= Html::cssFile('/favicon.ico', ['rel'=>'shortcut icon']) ?>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;url=/ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>
<body class="wrap">
    <!-- 网站标题 -->
    <div class="website"><a href="/">菜鸟·码农</a></div>
    <div class="frame main">
        <?= $content ?>
    </div>
    <div class="footer">
        <div class="frame version">2016-<?= date('Y') ?>@菜鸟.码农</div>
    </div>
</body>
