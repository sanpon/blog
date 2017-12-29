<?php
/**
 * 注册页面
 * @author pawn
 * @var \common\models\MembersModel $model
 * @date 2017年11月27日14:08:38
 */
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use vendor\toolkit\library\Front;

$this->title = '加入菜鸟';

?>
<div class="login">
    <div class="title">欢迎加入</div>
    <?php $form = ActiveForm::begin([
        'method'=>'POST', 'action'=>['sign'],
        'options'=>['class'=>'form-control'],
        'fieldConfig' => [
            'template' => '{input}'
        ],
    ])?>
    <ul>
        <li><input type="text" name="Members[username]" class="form-input" value="" autofocus placeholder="用户名"></li>
        <li><input type="password" name="Members[password]" class="form-input" value="" placeholder="密码"></li>
        <li><input type="text" name="Members[email]" class="form-input" value="" placeholder="邮箱"></li>
        <li>
            <?= $form->field($model, 'captcha', ['options'=>['class'=>'form-captcha']])
                ->widget(Captcha::className(), [
                    'captchaAction' => '/captcha',
                    'options'=>['class'=>'form-input captcha-value'],
                    'imageOptions'=>[ 'class'=>'captcha-img',  'id'=>'captcha-img', 'alt'=>'点击换图','title'=>'点击换图'],
                    'template' => '{image}{input}'
                ]) ?>
        </li>
        <li class="error"><?= implode(",", array_values($model->getFirstErrors())); ?></li>
        <li class="action"><a href="/">返回首页</a></li>
        <li><button class="btn form-submit">注册</button></li>
    </ul>
    <?php $form::end() ?>
    <?= Front::loadScriptWithCDN([
       'assets/lib/jquery/jquery.2.2.0.min.js'
    ]); ?>
    <script>
        $("#captcha-img").click(function () {
            var self = this,
                url = this.src;
            $.get(url + '&refresh='+Math.random(), function (data) {
                self.src = data.url;
            });
        });
    </script>
</div>
