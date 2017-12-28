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
$this->params['breadcrumbs'][] = ['label'=>'文章分类', 'url'=>['default/index']];
$this->params['breadcrumbs'][] = ['label'=>$this->title];
?>
<div class="catalog">
    <?php $form = ActiveForm::begin(['method'=>'POST', 'action'=>['create']]); ?>
    <?= $this->render('_form', [
        'form' => $form,
        'model' => $model,
        'category' => $category
    ]); ?>
    <?php ActiveForm::end(); ?>
</div>