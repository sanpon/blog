<?php
/* @var $this yii\web\View */
/* @var $title string 网页错误标题*/
/* @var $message string 网页错误消息 */
/* @var $code int 错误代码 */
/* @var $exception Exception */
use yii\helpers\Html;

$this->title = $message;
?>
<div class="error">
    <div class="message"><?= Html::encode($message) ?> - (#<?= $code ?>)</div>
    <div class="goHome"><a href="/">返回首页</a></div>
</div>