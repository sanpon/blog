<?php
/**
 * 更新文章页面
 * @author pawn
 * @var \yii\db\ActiveRecord $model
 * @var array $category 文章的分类
 * @date 2017年11月1日00:02:10
 */
use yii\widgets\ActiveForm;

$this->title = '更新文章';
$this->params['crumbs'][] = ['label'=>'博文管理', 'url'=>['index']];
$this->params['crumbs'][] = ['label'=>$this->title];
?>

<div class="main article update">
    <?php $form = ActiveForm::begin(['method'=>'POST', 'action'=>['default/update', 'id'=>$model->article_id]]); ?>
    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category
    ]) ?>
    <?php ActiveForm::end(); ?>
</div>
