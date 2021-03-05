<?php
/**
 * 用户信息更新
 * @author pawn
 * @date 2017年12月29日12:00:01
 */
use yii\widgets\ActiveForm;

$this->title = '更新用户';
$this->params['crumbs'][] = ['label'=>'用户管理', 'url'=>['index']];
$this->params['crumbs'][] = ['label'=>$this->title];
?>
<div class="user">
    <?php $form = ActiveForm::begin(['action'=>['update'], 'method'=>'POST']); ?>
    1111
    <?php ActiveForm::end(); ?>
</div>
