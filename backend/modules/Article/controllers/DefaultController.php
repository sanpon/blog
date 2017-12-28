<?php
/**
 * 博文管理模块
 * @author pawn
 * @date 2017年8月11日18:04:29
 */

namespace backend\modules\Article\controllers;

use backend\controllers\BaseController;
use backend\modules\Article\models\Article;
use backend\modules\Category\models\Category;

class DefaultController extends BaseController
{
    /**
     * 文章列表页
     * @author pawn
     * @return string
     * @date 2017年8月11日18:05:43
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'article' => Article::listQuery()
        ]);
    }

    /**
     * 发布文章
     * @author pawn
     * @date 2017年11月1日00:00:35
     */
    public function actionCreate()
    {
        $request = \Yii::$app->request;
        $model = new Article();
        if ($request->isPost) {
            if ($model->load($request->post()) && $model->save()) {
                return $this->success(['index']);
            }
            return $this->error($model);
        }

        return $this->render('create', [
            'model' => $model,
            'category' => Category::getCategoryTree()
        ]);
    }

    /**
     * 文章更新
     * @author pawn
     * @param int $id
     * @return string
     * @date 2017年12月17日22:13:24
     */
    public function actionUpdate(int $id = 0)
    {
        $request = \Yii::$app->request;
        $model = Article::findOne(['article_id' => $id]);
        if ($request->isPost) {
            if ($model->load($request->post()) && $model->save()) {
                return $this->success(['index']);
            }
            return $this->error($model);
        }
        return $this->render('update', [
            'model' => $model,
            'category' => Category::getCategoryTree()
        ]);
    }

    /**
     * 删除文章
     * @author pawn
     * @param int $id 文章ID
     * @date 2017年12月26日00:04:22
     */
    public function actionDelete(int $id = 0)
    {
    }
}
