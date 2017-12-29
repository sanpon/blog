<?php
/**
 * @author pawn
 * @var \yii\db\ActiveRecord $model
 * @var array $category 文章分类数据
 * @date 2017年12月17日16:14:03
 */
use vendor\toolkit\library\Form;
use vendor\toolkit\editor\UEditor;
use vendor\toolkit\library\Front;
?>
<?= Front::assetsCDN([
    'blog/src/backend/lib/tagit.js',
    'blog/src/backend/lib/dropdown.js'
]); ?>
<?= UEditor::config(); ?>
<ul class="form-control">
    <li>
        <?= Form::app()->tagIt($model, 'keywords', [
            'placeholder' => '关键字',
        ]) ?>
    </li>
    <li>
        <input type="text" name="Article[title]" value="<?= $model->title ?>" class="form-input" placeholder="无标题">
    </li>
    <li>
        <?= Form::app()->dropDown($model, 'cate_id', [
            'primaryKey' => 'cate_id',
            'default' => '请选择文章分类',
            'class' => 'active',
            'data' => $category
        ]) ?>
    </li>
    <li>
        <?= UEditor::setEditor($model, 'content', [
            'width' => '100%',
            'height' => 500
        ]); ?>
    </li>
    <li>
        <input type="submit" class="form-submit" value="<?= $model->isNewRecord ? '发布文章' : '更新文章' ?>">
    </li>
</ul>
