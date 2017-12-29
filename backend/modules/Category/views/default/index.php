<?php
/**
 * 分类管理首页
 * @author pawn
 * @var string $hide 隐藏数据
 * @date 2017年11月28日12:28:54
 */
use yii\helpers\Url;
use vendor\toolkit\library\Front;

$this->title = '分类管理';
$this->params['crumbs'][] = ['label'=>$this->title];

?>
<div id="hiddenData">
    <?= $hide ?>
</div>
<div class="catalog">
    <div class="controller clear">
        <ul class="publish clear">
            <li><label for="#">操作：</label></li>
            <li><a href="<?= Url::to(['default/create']) ?>" class="btn btn-primary">创建分类</a></li>
        </ul>
    </div>
    <table class="table" id="infinite">
        <thead>
        <tr>
            <th class="text-left">名称</th>
            <th>别名</th>
            <th>显示方式</th>
            <th>时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($category)) : ?>
        <tr>
            <td colspan="5" class="empty">抱歉,没有找到相关数据...</td>
        </tr>
        <?php else : ?>
            <?= $this->render('template', ['category'=>$category]); ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?= Front::assetsCDN([
    'blog/src/backend/lib/infinite.js',
]) ?>
