<?php
/**
 * 创建分类页面
 * @author pawn
 * @var \yii\db\ActiveRecord $model
 * @var array $category 分类信息
 * @date 2017年12月6日12:24:51
 */
use yii\widgets\ActiveForm;

$this->title = '创建分类';
$this->params['crumbs'][] = ['label'=>'文章分类', 'url'=>['default/index']];
$this->params['crumbs'][] = ['label'=>$this->title];
?>
<div class="main catalog create">
    <?php $form = ActiveForm::begin(['method'=>'POST', 'action'=>['create']]); ?>
    <?= $this->render('_form', [
        'form' => $form,
        'model' => $model,
        'category' => $category
    ]); ?>
    <?php ActiveForm::end(); ?>
</div>