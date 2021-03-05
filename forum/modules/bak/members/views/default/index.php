<?php
/**
 * 用户管理
 * @author pawn
 * @var \vendor\toolkit\library\Page $members
 * @var \backend\modules\Members\models\Members $member
 * @date 2017年11月27日20:29:34
 */
use yii\helpers\Url;

$this->title = '用户管理';
$this->params['crumbs'][] = ['label'=>$this->title];
?>
<div class="user">
    <div class="controller clear">
        <ul class="search clear">
            <li>设置：</li>
            <li>
                <label for="category"></label>
                <select name="category" id="category" class="category">
                    <option value="0">--用户身份--</option>
                    <option value="1">超级管理员</option>
                    <option value="1000">普通用户</option>
                </select>
            </li>
            <li><input type="text" class="input-text" placeholder="请输入搜索的关键字" /></li>
            <li>
                <a href="#" class="btn-search">搜索</a>
                <a href="#" class="btn-reset">重置</a>
            </li>
        </ul>
    </div>
    <?= $members->getPagesHtml(['class'=>'pagination pagination-top clear']) ?>
    <table class="table">
        <thead>
        <tr>
            <th>编号</th>
            <th>用户名</th>
            <th>角色</th>
            <th>权限</th>
            <th>邮箱</th>
            <th>手机</th>
            <th>爱好</th>
            <th>注册时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($members->getData())) : ?>
        <tr>
            <td colspan="9" class="empty">对不起,没有找到这样的用户...</td>
        </tr>
        <?php else : ?>
        <?php foreach ($members->getData() as $member) : ?>
        <tr>
            <td><?= $member->uid?></td>
            <td><a href="#" title="pawn"><?= $member->username ?></a></td>
            <td>php</td>
            <td>pawn</td>
            <td><?= $member->email ?></td>
            <td><?= $member->mobile ?></td>
            <td>seo 黑猫</td>
            <td><?= date('Y.m.d H:i:s', $member->datetime) ?></td>
            <td>
                <a href="<?= Url::to(['update', 'uid'=>$member->uid]) ?>">更新</a>
                <a href="<?= Url::to(['delete', 'uid'=>$member->uid]) ?>">删除</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <?= $members->getPagesHtml(['class'=>'pagination pagination-bottom clear']) ?>
</div>
