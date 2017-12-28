<?php
/**
 * 成功跳转提示页面
 * @author pawn
 * @var string $message 提示消息
 * @var string $url 跳转地址
 * @date 2017年12月6日13:02:44
 */
?>
<style>
    .jump{
        padding: 50px;
    }
    .jump p{
         line-height: 30px;
     }
    .jump .link{
        color: #24c2c6;
    }
    .text-danger{
        color: #FF5722;
    }
</style>
<div class="jump">
    <p class="text-danger"><?= isset($error) ? $error : '' ?></p>
    <p><?= $message ?>,请稍等...</p>
    <p>如果页面未跳转,<a href="<?= $url ;?>" class="link">请点击</a></p>
</div>
