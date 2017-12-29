<?php
use yii\helpers\Url;
use \vendor\toolkit\library\Front;

/* @var $content string */
$user = Yii::$app->user->identity;
$suffix = Yii::$app->params['titleSuffix'];
$this->title = $this->title ? $this->title . ' - ' . $suffix : $suffix;
$default = [['label'=>'控制面板', 'url'=>[Yii::$app->defaultRoute]]];
$this->params['crumbs'] = isset($this->params['crumbs']) ? array_merge($default, $this->params['crumbs']) : [];
//当前模块路由信息
$_module = $this->context->module->id;
$_action = $this->context->action->id;
$_route = $this->context->route;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>
    <meta name="renderer" content="webkit">
    <?= Front::assetsCDN([
        'assets/lib/jquery/jquery.2.2.0.min.js',
        'blog/src/backend/lib/slimscroll.min.js',
        'blog/dist/css/backend/'. $_module . '/' . $_action .'.min.css'
    ]); ?>
</head>
<body class="wrapper">
    <div class="sidebar" id="sidebar">
        <div class="header"><i class="icon icon-blog"></i></div>
        <div class="menu" id="menu">
            <dl>
                <?php foreach (Yii::$app->params['menu'] as $value) : ?>
                    <?php if (isset($value['children'])) : ?>
                        <dt>
                            <i class="icon <?= $value['icon'] ?>"></i>
                            <span class="menu-text"><?= $value['title'] ?></span>
                            <i class="icon icon-down right"></i>
                        </dt>
                        <?php foreach ($value['children'] as $val) : ?>
                            <?php if (trim(current($val['url']), '/')==$_route) : ?>
                                <dd><a href="<?= Url::to($val['url']) ?>" class="active"><?= $val['title'] ?></a></dd>
                            <?php else : ?>
                                <dd><a href="<?= Url::to($val['url']) ?>"><?= $val['title'] ?></a></dd>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <dt>
                            <i class="icon <?= $value['icon'] ?>"></i>
                        <?php if (trim(current($value['url']), '/')==$_route) : ?>
                            <a href="<?= Url::to($value['url']) ?>" class="active"><?= $value['title'] ?></a>
                        <?php else : ?>
                            <a href="<?= Url::to($value['url']) ?>"><?= $value['title'] ?></a>
                        <?php endif; ?>
                        </dt>
                    <?php endif; ?>
                <?php endforeach; ?>
            </dl>
        </div>
    </div>
    <div class="content">
        <div class="header clear">
            <ul class="nav">
                <li><?= Yii::$app->getUser()->identity->username ?></li>
                <li>
                    <a href="#">
                        <span>评论</span>
                        <span class="label label-danger">18</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>留言</span>
                        <span class="label label-primary">43</span>
                    </a>
                </li>
                <li><a href="/" target="_blank">前台首页</a></li>
                <li><a href="<?= Url::to('/logout.html') ?>">退出</a></li>
            </ul>
        </div>
        <div class="container" id="pjax-container">
            <?php if ($this->params['crumbs']) : ?>
                <ul class="breadcrumbs clear">
                    <?php foreach ($this->params['crumbs'] as $item) : ?>
                        <?php if (isset($item['url'])) : ?>
                            <li><a href="<?= Url::toRoute($item['url'])?>"><?= $item['label'] ?></a></li>
                        <?php else : ?>
                            <li><?= $item['label'] ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?= $content ?>
        </div>
    </div>
    <!-- 全局隐藏域 -->
    <div id="global-hide"><?= isset($this->params['hide']) ? $this->params['hide'] : '' ?></div>

    <!-- 加载loading -->
    <div class="loading" id="loading">
        <div class="container">
            <i class="icon icon-spin icon-loading"></i>
            <span class="text">加载中。。。</span>
        </div>
    </div>
    <?= Front::assetsCDN(['blog/dist/lib/main.min.js']) ?>
</body>
</html>