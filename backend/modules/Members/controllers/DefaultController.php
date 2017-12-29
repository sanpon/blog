<?php
/**
 * 用户管理模块
 * @author pawn
 * @date 2017年11月27日20:24:46
 */
namespace backend\modules\Members\controllers;

use backend\controllers\BaseController;
use backend\modules\Members\models\Members;

class DefaultController extends BaseController
{
    /**
     * 用户管理列表页
     * @author pawn
     * @return string
     * @date 2017年12月29日11:58:54
     */
    public function actionIndex()
    {
        $members = new Members();
        $members = $members->listQuery();
        return $this->render('index', [
            'members' => $members
        ]);
    }

    /**
     * 用户信息更新
     * @author pawn
     * @date 2017年12月29日11:59:21
     */
    public function actionUpdate()
    {
        return $this->render('update');
    }
}
