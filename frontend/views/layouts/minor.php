<?php
use yii\helpers\Html;
use vendor\toolkit\library\Front;

/* @var $content */
?>
<!DOCTYPE html>
<html>
<?= $this->render('head'); ?>
<body class="wrap">
    <!-- 网站标题 -->
    <div class="website"><a href="/"><?= Yii::$app->params['website'] ?></a></div>
    <div class="frame main">
        <?= $content ?>
    </div>
    <div class="footer">
        <div class="frame version">2016-<?= date('Y') ?>@<?= Yii::$app->params['website'] ?></div>
    </div>
</body>
