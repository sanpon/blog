<?php
/**
 * 面包屑导航条
 * @author pawn
 * @var $content
 * @date 2017年10月31日18:41:37
 */
use yii\helpers\Url;
use \vendor\toolkit\library\Front;

$suffix = Yii::$app->params['titleSuffix'];

$this->title = $this->title ? $this->title . ' - ' . $suffix : $suffix;
$default = [['label'=>'控制面板', 'url'=>[Yii::$app->defaultRoute]]];
$this->params['crumbs'] = isset($this->params['crumbs']) ? array_merge($default, $this->params['crumbs']) : [];
$context = $this->context;
?>
<title><?= $this->title ?></title>

<?= Front::loadCssWithCDN([
    'blog/dist/css/backend/'. $context->module->id . '/' . $context->action->id .'.min.css'
]) ?>
<?php if ($this->params['breadcrumbs']) : ?>
<ul class="breadcrumbs clear">
    <?php foreach ($this->params['breadcrumbs'] as $item) : ?>
        <?php if (isset($item['url'])) : ?>
            <li><a href="<?= Url::to()?>"><?= $item['label'] ?></a></li>
        <?php else : ?>
            <li><?= $item['label'] ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
<?= $content ?>
