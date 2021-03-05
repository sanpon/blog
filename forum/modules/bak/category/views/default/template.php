<?php
/**
 * 列表模板页面
 * @author pawn
 * @var array $category 分类数据
 * @date 2017年12月6日19:10:35
 */
use yii\helpers\Url;
use backend\modules\Category\models\Category;

?>
<?php foreach ($category as $cate) : ?>
    <tr class="<?= implode(' ', $cate['class']) ?>">
        <td class="left">
            <span><?= str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $cate['level']) ?></span>
            <?php if ($cate['total']>0) : ?>
            <i class="icon icon-caret-right symbol" data-type="plus" id="<?= $cate['cate_id'] ?>" data-click="0"></i>
            <?php else : ?>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <?php endif; ?>
            <?= $cate['name'] ?>
        </td>
        <td><?= $cate['nickname'] ?></td>
        <td><?= $cate['type']==Category::NAME ? '名称' : '别名' ?></td>
        <td><?= $cate['datetime'] ?></td>
        <td>
            <a href="<?= Url::to(['delete', 'id'=>$cate['cate_id']]) ?>">删除</a>
            <a href="<?= Url::to(['update', 'id'=>$cate['cate_id']]) ?>">修改</a>
        </td>
    </tr>
<?php endforeach; ?>
