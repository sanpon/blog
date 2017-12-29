<?php
/* @var $this yii\web\View */
/* @var $title string 网页错误标题*/
/* @var $message string 网页错误消息 */
/* @var $code int 错误代码 */
/* @var $exception Exception */
use yii\helpers\Html;

$this->title = isset($message) ? $message : '系统出错了';
?>
<div class="error">
    <div class="message"><?= $code ? Html::encode($message) : '页面未找到' ?> - (#<?= $code ? $code : '404' ?>)</div>
    <div class="goHome"><a href="/">返回首页</a></div>
</div>