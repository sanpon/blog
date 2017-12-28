<?php
use yii\helpers\Html;
use vendor\toolkit\Functions\FrontHelper;
/* @var $content */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?> - <?= Yii::$app->params['titleSuffix'] ?></title>
    <meta name="keywords" content="胖子的商城">
    <meta name="description" content="胖子的商城描述信息">

    <?= FrontHelper::loadCssWithCDN([
        'blog/dist/css/blog.min.css',
    ]) ?>
    <?= Html::cssFile('/favicon.ico', ['rel'=>'shortcut icon']) ?>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;url=/ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>
<body class="wrap">
    <!-- 网站标题 -->
    <div class="website"><a href="/">菜鸟·码农</a></div>
    <div class="header">
        <div class="frame clear">
            <ul class="navigation clear">
                <li><a href="/">首页</a></li>
                <li>
                    <a href="#">PHP笔记</a>
                    <ol>
                        <li><a href="#">零基础入门学习PHP</a></li>
                        <li><a href="#">零基础入门学习PHP</a></li>
                        <li class="last"><a href="#">零基础入门学习PHP</a></li>
                    </ol>
                </li>
                <li><a href="#">前端笔记</a></li>
                <li><a href="#">PHP开发</a></li>
                <li><a href="#">我要吐槽</a></li>
            </ul>
            <div class="search"><input type="text" placeholder="菜鸟查询..."></div>
        </div>
    </div>

    <!-- 热点图区域 -->
    <div class="banner">
        <div class="frame cate-route">PHP笔记&nbsp;·&nbsp;零基础入门学习PHP&nbsp;·&nbsp;PHP数组</div>
    </div>

    <!-- 主要框架 -->
    <div class="frame main clear">
        <?= $content ?>
        <div class="extent">
            <fieldset class="widget">
                <legend class="title">热门推荐</legend>
                <ul class="context">
                    <li><a href="#">Zabbix通过jmx监控tomcat</a></li>
                    <li><a href="#">Zabbix新增Nginx活动连接数监...</a></li>
                    <li><a href="#">gitlab 安装</a></li>
                    <li><a href="#">Python 调用putty 实现自动登录</a></li>
                    <li><a href="#">python socket基础</a></li>
                </ul>
            </fieldset>
            <fieldset class="widget">
                <legend class="title">菜鸟收藏</legend>
                <ul class="context">
                    <li><a href="//www.mylinuxer.com" target="_blank">垃圾网管说运维</a></li>
                    <li><a href="//www.tmy.me" target="_blank">老司机成长记</a></li>
                    <li><a href="//bbs.fishc.com" target="_blank">小甲鱼养殖场</a></li>
                    <li><a href="//blog.fishc.com" target="_blank">老甲鱼熬汤</a></li>
                    <li><a href="//www.chengduseoblog.cn" target="_blank">成都SEO</a></li>
                </ul>
            </fieldset>
        </div>
    </div>
    <div class="footer">
        <div class="frame version">2016-<?= date('Y') ?>@菜鸟.码农</div>
    </div>
</body>
</html>