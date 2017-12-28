<?php
/**
 * 开发环境设置
 * @author pawn
 * @date 2017年7月17日21:31:58
 */
namespace backend\modules\Tool\controllers;

use backend\controllers\BaseController;

class EnvController extends BaseController
{
    /**
     * 显示环境切换页面
     * @author pawn
     * @date 2017年7月17日21:34:04
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 切换PHP开发环境
     * @author pawn
     * @date 2017年7月17日21:32:39
     */
    public function actionSwitch()
    {

    }
}