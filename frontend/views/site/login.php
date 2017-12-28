<?php
use vendor\toolkit\Functions\FrontHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $model \yii\db\ActiveRecord */

$this->title = '登录';
?>
<div class="login">
    <?php $form = ActiveForm::begin(['method'=>'POST', 'action'=>['login'], 'options'=>['class'=>'form-control']])?>
    <ul>
        <li><input type="text" name="Members[username]" class="form-input" value="<?= $model->username ?>" autofocus placeholder="用户名"></li>
        <li><input type="password" name="Members[password]" class="form-input" value="" placeholder="密码"></li>
        <li class="error"><?= $model->getFirstError('password') ?></li>
        <li class="action"><a href="#">忘记密码</a> &nbsp; <a href="<?= Url::to(['/sign']) ?>">注册账号</a> &nbsp; <a href="/">返回首页</a></li>
        <li><button class="btn form-submit">登录</button></li>
    </ul>
    <input type="hidden" name="tn" value="<?= Yii::$app->request->get('tn', $model->tn) ?>" />
    <?php $form::end() ?>
</div>


