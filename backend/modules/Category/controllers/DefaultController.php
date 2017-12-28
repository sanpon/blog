<?php
/**
 * 分类管理器
 * @author pawn
 * @date 2017年11月28日12:29:44
 */
namespace backend\modules\Category\controllers;

use backend\controllers\BaseController;
use backend\modules\Category\models\Category;
use vendor\toolkit\Output\Hide;
use yii\helpers\Url;

class DefaultController extends BaseController
{
    /**
     * 分类列表页
     * @author pawn
     * @return string
     * @date 2017年11月28日12:29:52
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'category' => Category::listQuery(),
            'hide' => Hide::setHides([
                'cateRoute' => Url::to(['submenu'])
            ])
        ]);
    }

    /**
     * ajax获取分类数据
     * @author pawn
     * @param int $pid 需要查询的分类的父级ID
     * @return string
     * @date 2017年12月6日17:10:38
     */
    public function actionSubmenu($pid = 0)
    {
        return $this->renderPartial('template', [
            'category' => Category::listQuery($pid),
            'pid' => $pid
        ]);
    }

    /**
     * 创建分类
     * @author pawn
     * @return string
     * @date 2017年12月6日12:40:33
     */
    public function actionCreate()
    {
        $request = \Yii::$app->request;
        $category = new Category();
        if ($request->isPost) {
            if ($category->load($request->post()) && $category->save()) {
                return $this->success();
            }
            return $this->error($category);
        }

        return $this->render('create', [
            'model' => $category,
            'category' => Category::getCategoryTree()
        ]);
    }

    /**
     * 更新
     * @author pawn
     * @param int $id
     * @return string
     * @date 2017年12月15日02:32:05
     */
    public function actionUpdate($id = 0)
    {
        $request = \Yii::$app->request;
        $model = Category::findOne(['cate_id'=>$id]);
        if ($request->isPost) {
            $model->load($request->post());
            if ($model->load($request->post()) && Category::canChangeParent($model) && $model->save()) {
                return $this->success();
            }
            return $this->error($model);
        }

        return $this->render('update', [
            'model' => $model,
            'category' => Category::getCategoryTree()
        ]);
    }
}
