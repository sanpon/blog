<?php
/**
 * 公用头部信息
 * @author pawn
 * @date 2017年12月28日21:26:13
 */
use yii\helpers\Html;
use vendor\toolkit\library\Front;
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?> - <?= Yii::$app->params['titleSuffix'] ?></title>
    <meta name="keywords" content="胖子的商城">
    <meta name="description" content="胖子的商城描述信息">

    <?= Front::assetsCDN([
        'blog/dist/css/blog.min.css',
    ]) ?>
    <?= Html::cssFile('/favicon.ico', ['rel'=>'shortcut icon']) ?>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;url=/ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>
