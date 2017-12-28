<?php
/**
 * 前端基础控制器
 * @author pawn
 * @date 2017年12月28日20:14:56
 */
namespace frontend\controllers;

use vendor\toolkit\library\Terminal;
use yii\web\Controller;

class BaseController extends Controller
{
    public function init()
    {
        if (Terminal::isMobile()) {
            $this->layout = '//terminal';
        }
        parent::init();
    }

    /**
     * 错误控制
     * @author pawn
     * @return string
     * @date 2017年11月27日13:49:49
     */
    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;
        $this->layout = 'login';
        return $this->render('//site/error', [
            'message' => $exception->getMessage(),
            'code' => $exception->getCode() ? $exception->getCode() : '404'
        ]);
    }
}
