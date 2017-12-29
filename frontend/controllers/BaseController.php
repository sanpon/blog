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
}
