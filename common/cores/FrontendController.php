<?php
/**
 * 前端基础控制器
 * @author pawn
 * @date 2017年12月28日20:14:56
 */

namespace common\controllers;

use yii\web\Response;

class FrontendController extends WebController
{
    //是否响应JSON
    public $json = false;

    public function beforeAction($action)
    {
        if ($this->json) {
            define('API_MODULE', true);
            \Yii::$app->getResponse()->format = Response::FORMAT_JSON;
        }

        return parent::beforeAction($action);
    }
}
