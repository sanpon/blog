<?php

$this->title = 'PHP码农';
?>
<div class="container index">
    <div class="list">
        <?php
        $len = count($list)-1;
        foreach ($list as $k => $l) :
        ?>
        <ul class="row <?= $len==$k ? 'last' : '' ?>">
            <li class="title">
                <a href="<?= $l['url'] ?>"><?= $l['title'] ?></a>
            </li>
            <li class="counter">
                <ol class="clear">
                    <li>
                        <i class="icon icon-cate"></i>
                        <span>极客Python之效率革命</span>
                    </li>
                    <?php if ($l['keywords']) : ?>
                    <li>
                        <i class="icon icon-tags"></i>
                        <?php foreach ($l['keywords'] as $k) : ?>
                        <span class="tag"><?= $k ?></span>
                        <?php endforeach; ?>
                    </li>
                    <?php endif; ?>
                    <li>
                        <i class="icon icon-clock"></i>
                        <span><?= $l['datetime'] ?></span>
                    </li>
                    <li>
                        <i class="icon icon-message" title="评论量"></i>
                        <span><?= $l['comments'] ?></span>
                    </li>
                </ol>
            </li>
            <li class="thumb"><img src="http://static.roxtiger.com/blog/dist/images/ban-01.png" alt=""></li>
            <li class="detail"><p><?= $l['summary'] ?></p></li>
        </ul>
        <?php endforeach; ?>
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