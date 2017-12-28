<?php
/**
 * 地址管理
 * @author pawn
 * @date 2017年6月5日23:45:45
 */
namespace backend\modules\Tool\controllers;;

use backend\controllers\BaseController;
use backend\modules\Tool\models\District;
use vendor\toolkit\Output\Hide;

class DistrictController extends BaseController
{
    /**
     * 地址管理
     * @author pawn
     * @param int $parent_id 地址的父ID
     * @return string
     * @date 2017年5月29日00:28:15
     */
    public function actionIndex($parent_id = 0)
    {
        //$this->view->params['hide'] = Hide::setHide('district', District::search($parent_id));

        return $this->render('index');
    }
}
