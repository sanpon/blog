<?php
/**
 *
 * @author pawn
 * @date
 */

namespace frontend\controllers;

use vendor\toolkit\Functions\Terminal;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\HttpException;

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