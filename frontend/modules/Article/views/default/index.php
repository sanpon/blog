<?php
use yii\helpers\Url;

$this->title = 'PHP码农';
?>
<div class="container index">
    <div class="list">
        <ul class="row">
            <li class="title"><a href="<?= Url::to(['/article/default/detail', 'id'=>1]) ?>">爬取豆瓣Top250电影排行榜</a></li>
            <li class="counter">
                <ol class="clear">
                    <li>
                        <i class="icon icon-cate"></i>
                        <span>极客Python之效率革命</span>
                    </li>
                    <li>
                        <i class="icon icon-tags"></i>
                        <span class="tag">Python</span>
                        <span class="tag">爬虫</span>
                        <span class="tag">电影</span>
                    </li>
                    <li>
                        <i class="icon icon-clock"></i>
                        <span>2017年11月17日 11:36:34</span>
                    </li>
                    <li>
                        <i class="icon icon-message" title="评论量"></i>
                        <span>156</span>
                    </li>
                </ol>
            </li>
            <li class="thumb"><img src="http://blog.fishc.com/wp-content/uploads/2015/08/75b1OOOPIC9b.jpg" alt=""></li>
            <li class="detail"><p>Linux通过 nice 命令更改优先级执行诚如，范围为-20(最高优先) 到19(最低优先) 使用这个命令必须为root 例如： 把sshd进程设置最高优先级， 当服务器CPU无论怎么暴涨， 都保证ssh能正常连接 改变进程优先级有两种， 一是进程已经在执行的情况， 二是还未执行 1.进程已经在</p></li>
        </ul>
        <ul class="row last">
            <li class="title"><a href="<?= Url::to(['detail']) ?>">爬取豆瓣Top250电影排行榜</a></li>
            <li class="counter">
                <ol class="clear">
                    <li>
                        <i class="icon icon-tags"></i>
                        <span class="tag">Python</span>
                        <span class="tag">爬虫</span>
                        <span class="tag">电影</span>
                    </li>
                    <li>
                        <i class="icon icon-view" title="浏览量"></i>
                        <span>156</span>
                    </li>
                    <li>
                        <i class="icon icon-message" title="评论量"></i>
                        <span>156</span>
                    </li>
                    <li>
                        <i class="icon icon-praise" title="点赞量"></i>
                        <span>156</span>
                    </li>
                    <li>
                        <i class="icon icon-clock"></i>
                        <span>2017年11月17日 11:36:34</span>
                    </li>
                </ol>
            </li>
            <li class="thumb"><img src="http://blog.fishc.com/wp-content/uploads/2015/08/75b1OOOPIC9b.jpg" alt=""></li>
            <li class="detail"><p>Linux通过 nice 命令更改优先级执行诚如，范围为-20(最高优先) 到19(最低优先) 使用这个命令必须为root 例如： 把sshd进程设置最高优先级， 当服务器CPU无论怎么暴涨， 都保证ssh能正常连接 改变进程优先级有两种， 一是进程已经在执行的情况， 二是还未执行 1.进程已经在</p></li>
        </ul>
    </div>

    <ol class="pagination clear">
        <li><a href="#">上一页</a></li>
        <li><a class="active">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">下一页</a></li>
    </ol>
</div>