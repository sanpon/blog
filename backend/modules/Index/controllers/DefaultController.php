<?php
/**
 * 默认控制器管理
 * @author pawn
 * @date
 */
namespace backend\modules\Index\controllers;

use backend\controllers\BaseController;
use backend\modules\Index\models\Index;

class DefaultController extends BaseController
{
    /**
     * 后台首页
     * @author pawn
     * @return string
     * @date 2017年5月16日20:28:52
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'recent' => Index::getRecentArticle(), //查询最近的文章
        ]);
    }
}