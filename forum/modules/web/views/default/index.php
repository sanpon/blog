<?php
use yii\helpers\Url;
//use backend\modules\Article\models\Article;

$this->title = '控制面板';
?>
<div class="main dashboard">
    <div class="item-box">
        <h1 class="box-title">快捷菜单</h1>
        <ul class="box-content box-inline clear">
            <li>
                <a href="<?= Url::to(['/article/default/index']) ?>">
                    <i class="icon icon-edit"></i>
                    <span>发布文章</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon icon-seo"></i>
                    <span>SEO设置</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="item-box">
        <h1 class="box-title clear">
            <span>最新文章</span>
            <a href="<?= Url::to(['/article/default/index']) ?>" class="r">更多</a>
        </h1>
        <ul class="box-content box-list">
            <?php if (empty($recent)) : ?>
                <li class="text-danger default">这个家伙很懒,最近一周都没有发布文章</li>
            <?php else : ?>
                <?php foreach ($recent as $r) : ?>
                    <li class="clear">
                        [<span class="text-danger article-tag"><?= $r['name'] ?></span>]
<!--                        --><?//= Article::jumpFront($r['title'], ['article/default/detail', 'id' => $r['id']]) ?>
                        <span class="text-danger right"><?= date('Y.m.d', $r['datetime']) ?></span>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="item-box">
        <h1 class="box-title">
            <span>最新留言</span>
            <a href="#" class="r">更多</a>
        </h1>
        <ul class="box-content box-list">
            <li>
                <a href="#">张三:为什么用楼主的代码没有实现相同的...</a>
                <span class="text-danger r">2017.02.01</span>
            </li>
            <li>
                <a href="#">bang:javascript数组操作方式"留言:为什么用楼主的代码没有实现相同的...</a>
                <span class="text-danger r">2017.02.03</span>
            </li>
            <li class="text-default">暂无留言</li>
        </ul>
    </div>
    <div class="item-box">
        <h1 class="box-title">
            <span>最新评论</span>
            <a href="#" class="r">更多</a>
        </h1>
        <ul class="box-content box-list">
            <li>
                <a href="#">[张三]关于"javascript数组操作方式"留言:为什么用楼主的代码没有实现相同的...</a>
                <span class="text-danger r">2017.02.01</span>
            </li>
            <li>
                <a href="#">[bang]关于"javascript数组操作方式"留言:为什么用楼主的代码没有实现相同的...</a>
                <span class="text-danger r">2017.02.03</span>
            </li>
            <li class="text-default">暂无评论</li>
        </ul>
    </div>
</div>

