<?php
/**
 * 商品模块
 * @author pawn
 * @date 2017年5月7日17:41:24
 */

namespace frontend\modules\Article\controllers;

use frontend\controllers\BaseController;
use frontend\modules\Article\models\Article;

class DefaultController extends BaseController
{
    /**
     * 网站首页
     * @author pawn
     * @return string
     */
    public function actionIndex()
    {
        return  $this->render('index');
    }

    /**
     * 文章详情页
     * @author pawn
     * @param int $id 文章ID
     * @return string
     * @date 2017年11月13日10:19:25
     */
    public function actionDetail(int $id)
    {
        return $this->render('detail', [
            'article' => Article::getDetail($id)
        ]);
    }


    public function actionTestLanguage()
    {
        echo \Yii::t('goods', 'goods list');
        die;
    }
}