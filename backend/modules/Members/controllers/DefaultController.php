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
    public function actionIndex()
    {
        $members = new Members();
        $members = $members->listQuery();
        return $this->render('index', [
            'members' => $members
        ]);
    }
}