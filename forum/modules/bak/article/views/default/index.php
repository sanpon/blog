<?php
/**
 * 博文管理页面
 * @author pawn
 * @var \library\core\Page $article 文章数据
 * @date 2017年9月26日18:28:36
 */
use yii\helpers\Url;
use backend\modules\Article\models\Article;

$this->title = '博文管理';
$this->params['crumbs'][] = ['label'=>$this->title];
?>
<div class="main article index">
    <div class="controller clear">
        <ul class="search clear">
            <li>设置：</li>
            <li>
                <label for="category"></label>
                <select name="category" id="category" class="category">
                    <option value="0">--请选择文章分类--</option>
                    <option value="PHP">PHP</option>
                    <option value="Redis">Redis</option>
                    <option value="C语言">C语言</option>
                </select>
            </li>
            <li><input type="text" class="input-text" placeholder="请输入搜索的关键字" /></li>
            <li>
                <a href="#" class="btn-search">搜索</a>
                <a href="#" class="btn-reset">重置</a>
            </li>
        </ul>
        <ul class="publish clear">
            <li><label for="#">操作：</label></li>
            <li><a href="<?= Url::to(['default/create']) ?>" class="btn btn-success">发布文章</a></li>
        </ul>
    </div>
    <?= $article->getPagesHtml(['class'=>'pagination pagination-top clear']) ?>
    <table class="table">
        <thead>
            <tr>
                <th>编号</th>
                <th>文章名称</th>
                <th>分类</th>
                <th>关键字</th>
                <th>作者</th>
                <th>发布时间</th>
                <th>评论量</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($article->getData())) :?>
            <tr>
                <td colspan="9" class="empty">对不起,没有这样的文章...</td>
            </tr>
            <?php else : ?>
                <?php foreach ($article->getData() as $item) : ?>
            <tr>
                <td><?= $item['article_id'] ?></td>
                <td class="left">
                    <?= Article::jumpFront($item['title'], ['article/default/detail', 'id'=>$item['article_id']]) ?>
                </td>
                <td><?= $item['cate'] ?></td>
                <td><?= $item['keywords'] ?></td>
                <td><?= $item['username'] ?></td>
                <td><?= date('Y.m.d H:i:s', $item['datetime']) ?></td>
                <td><?= $item['comments'] ?></td>
                <td>
                    <a href="<?= Url::to(['update', 'id'=>$item['article_id']]) ?>">更新</a>
                    <a href="<?= Url::to(['delete', 'id'=>$item['article_id']]) ?>">删除</a>
                </td>
            </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?= $article->getPagesHtml(['class'=>'pagination pagination-bottom clear']) ?>
</div>
