<?php
/**
 * 配置管理控制器
 * @author pawn
 * @date 2018年01月05日 00:48:26
 */
namespace backend\modules\configure\controllers;

use backend\controllers\BaseController;

class DefaultController extends BaseController
{
    public function actionEnv()
    {
        return $this->render('env');
    }
}
