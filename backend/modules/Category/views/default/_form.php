<?php
/**
 * 分类表单模板
 * @author pawn
 * @var array $category 分类数据
 * @date 2017年12月15日11:37:322
 */
use vendor\toolkit\Functions\FrontHelper;
use \vendor\toolkit\Functions\FormHelper;

?>
<?= FrontHelper::loadScriptWithCDN([
    'blog/src/backend/lib/marquee.js',
    'blog/src/backend/lib/dropdown.js',
]) ?>
<div class="form-control">
    <?= $form->field($model, 'name', [
        'template' => '{label}{input}<span class="comment">{hint}</span>',
        'parts' => [
            '{hint}' => '分类的名称,1~50个字符',
        ],
        'labelOptions' => [
            'class' => 'form-label'
        ]
    ])->textInput([
        'placeholder' => '分类名称',
        'class' => 'form-input'
    ]) ?>
    <?= $form->field($model, 'nickname', [
        'template' => '{label}{input}<span class="comment">{hint}</span>',
        'parts' => [
            '{hint}' => '分类的别名,1~60个字符',
        ],
        'labelOptions' => [
            'class' => 'form-label'
        ]
    ])->textInput([
        'placeholder' => '分类别名',
        'class' => 'form-input'
    ]) ?>
    <?= FormHelper::app()->radioList($model, 'type', [
        'name' => '显示方式',
        'hint' => '分类在前端的显示名称',
        'class' => 'active',
        'data' => [
            [
                'id' => 'name',
                'label' => '名称',
                'value' => 1
            ],
            [
                'id' => 'nickname',
                'label' => '别名',
                'value' => 2
            ]
        ]
    ]) ?>
    <?= FormHelper::app()->checkboxList($model, 'fav', [
        'name' => '兴趣爱好',
        'hint' => '设置兴趣爱好',
        'class' => 'active',
        'data' => [
            [
                'id' => 'football',
                'label' => '足球',
                'value' => 1
            ],
            [
                'id' => 'basketball',
                'label' => '篮球',
                'value' => 2
            ]
        ]
    ]) ?>
    <?= FormHelper::app()->dropDown($model, 'pid', [
        'name' => '父级分类',
        'primaryKey' => 'cate_id',
        'default' => '顶级分类',
        'class' => 'active',
        'data' => $category
    ]) ?>
    <div class="form-group last">
        <input type="submit" class="form-submit" value="<?= $model->isNewRecord ? '创建分类' : '更新分类' ?>">
    </div>
</div>

