<?php
$this->title = '运行环境设置';
$this->params['breadcrumbs'][] =['label'=>'系统设置', 'url'=>['index']];
$this->params['breadcrumbs'][] =['label'=>$this->title];

?>

<div class="ibox-content">
    <p>系统运行环境包含：<span class="label label-primary">生产模式</span> 和 <span class="label label-primary">开发模式</span></p>
    <p>当前模式：<span class="label label-warning">生产模式</span></p>
    <p><button type="button" class="btn btn-w-m btn-info">切换环境</button></p>
</div>