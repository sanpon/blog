<?php
/**
 * 详情页面
 * @author pawn
 * @var array $article
 * @date 2017年11月13日10:12:40
 */
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = $article['title'];

?>
<link rel="stylesheet" href="http://static.roxtiger.com/assets/lib/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css">
<script src="http://static.roxtiger.com/assets/lib/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
<div class="container view">
    <ul class="row">
        <li class="title"><?= $article['title'] ?></li>
        <li class="counter">
            <ol class="clear">
                <li>
                    <i class="icon icon-cate"></i>
                    <a href="<?= Url::to(['category', 'id'=>$article['cid']]) ?>" class="tag link"><?= $article['category'] ?></a>
                </li>
                <?php if ($article['keywords']) : ?>
                <li>
                    <i class="icon icon-tags"></i>
                    <?php foreach ($article['keywords'] as $val) : ?>
                    <a href="#" class="tag link"><?= $val ?></a>
                    <?php endforeach; ?>
                </li>
                <?php endif; ?>
                <li>
                    <i class="icon icon-clock"></i>
                    <span><?= $article['datetime'] ?></span>
                </li>
                <li>
                    <i class="icon icon-message" title="评论量"></i>
                    <a href="#evaluate" class="tag link"><?= $article['comments'] ?></a>
                </li>
            </ol>
        </li>
        <li class="detail"><?= $article['content'] ?></li>
    </ul>
    <div class="social">
        <a href="#">赏</a>
    </div>
    <ul class="nav">
        <li>
            <span>上一篇：</span>
            <?php if ($article['prev']) : ?>
            <a href="<?= $article['prev']['url'] ?>"><?= $article['prev']['title'] ?></a>
            <?php else : ?>
                <span>没有了</span>
            <?php endif; ?>
        </li>
        <li>
            <span>下一篇：</span>
            <?php if ($article['next']) : ?>
                <a href="<?= $article['next']['url'] ?>"><?= $article['next']['title'] ?></a>
            <?php else : ?>
                <span>没有了</span>
            <?php endif; ?>
        </li>
    </ul>
    <div class="replay form-control" id="evaluate">
        <h1 class="title">我有疑问</h1>
        <?php ActiveForm::begin(['method'=>'POST']) ?>
        <div class="area-wrap">
            <textarea name="" id="" class="form-area" placeholder="写点什么..."></textarea>
        </div>
        <ol class="user-form clear">
            <li class="left username">
                <label for="#">用户名：</label>
                <input type="text" class="form-input">
            </li>
            <li class="left">
                <label for="#">邮箱：</label>
                <input type="text" class="form-input">
            </li>
            <li class="right">
                <input type="submit" class="form-submit" value="提交">
            </li>
        </ol>
        <?php ActiveForm::end(); ?>
        <div class="list">
            <ul>
                <li class="user"><span class="name">#1 pawn</span><span class="time">2017年11月13日10:50:41</span></li>
                <li class="comments">文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的</li>
                <li class="replies">感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢</li>
                <li class="admin"><span class="time">2017年11月14日19:46:18</span><span class="name">管理员</span></li>
            </ul>
            <ul>
                <li class="user"><span class="name">#1 pawn</span><span class="time">2017年11月13日10:50:41</span></li>
                <li class="comments">文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的</li>
                <li class="replies">感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持</li>
                <li class="admin"><span class="time">2017年11月14日19:46:18</span><span class="name">管理员</span></li>
            </ul>
            <ul>
                <li class="user"><span class="name">#1 pawn</span><span class="time">2017年11月13日10:50:41</span></li>
                <li class="comments">文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的</li>
                <li class="replies">感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持</li>
                <li class="admin"><span class="time">2017年11月14日19:46:18</span><span class="name">管理员</span></li>
            </ul>
            <ul>
                <li class="user"><span class="name">#1 pawn</span><span class="time">2017年11月13日10:50:41</span></li>
                <li class="comments">文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的</li>
                <li class="replies">感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持</li>
                <li class="admin"><span class="time">2017年11月14日19:46:18</span><span class="name">管理员</span></li>
            </ul>
            <ul>
                <li class="user"><span class="name">#1 pawn</span><span class="time">2017年11月13日10:50:41</span></li>
                <li class="comments">文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的文章写得还不够完善,需要改进的地方挺多的</li>
                <li class="replies">感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持感谢，因为自己也只是菜鸟因此写得不够完善,感谢支持</li>
                <li class="admin"><span class="time">2017年11月14日19:46:18</span><span class="name">管理员</span></li>
            </ul>
        </div>
        <ol class="pagination clear">
            <li><a href="#">上一页</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a class="current">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">下一页</a></li>
        </ol>
    </div>
</div>
<script>
    SyntaxHighlighter.all({'quick-code':false, 'height': 500, 'title': '[code]'});
</script>
