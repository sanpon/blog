<?php
/**
 * 基础控制器
 * @author pawn
 * @date 2017年5月28日23:25:48
 */
namespace backend\controllers;

use backend\data\UserGroup;
use vendor\toolkit\library\Redirect;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Controller;

class BaseController extends Controller
{
    /**
     * 登录与模板切换
     * @author pawn
     * @param \yii\base\Action $action
     * @return mixed|bool
     * @date 2017年7月27日10:31:09
     */
    public function beforeAction($action)
    {
        //检测登录
        $member = \Yii::$app->getUser()->getIdentity();
        if (empty($member)) {
            $url = \Yii::$app->getUrlManager()->getHostInfo().'/login.html?tn='.Redirect::callback();
            $this->redirect($url)->send();
            exit;
        }

        //管理员检测
        if (!in_array($member->group_id, UserGroup::ADMIN)) {
            $this->redirect('/')->send();
            exit;
        }

        if (\Yii::$app->request->isPjax) {
            $this->layout = '//child';
        } else {
            $this->layout = '//main';
        }

        //切换模板
//        $controller = strtolower(\Yii::$app->controller->id);
//        $action = strtolower(\Yii::$app->controller->action->id);
//        $this->layout = $controller=='index' && $action=='index' ? false : '//main';

        return parent::beforeAction($action);
    }

    /**
     * 成功提示跳转页面
     * @author pawn
     * @param array $url 页面跳转地址
     * @return string
     * @date 2017年12月6日13:00:28
     */
    public function success(array $url = [])
    {
        return $this->render('//layouts/jump', [
            'message' => '操作成功,页面正在跳转',
            'url' => $url ? Url::to($url) : Url::to(['index'])
        ]);
    }

    /**
     * 错误跳转提示
     * @author pawn
     * @param array $url
     * @param ActiveRecord $model 发生错误的模块类
     * @return string
     * @date 2017年12月6日13:14:06
     */
    public function error(ActiveRecord $model, array $url = [])
    {
        return $this->render('//layouts/jump', [
            'error' => implode(',', $model->getFirstErrors()),
            'message' => '操作失败,页面正在返回',
            'url' => $url ? Url::to($url) : 'javascript: history.go(-1);'
        ]);
    }
}
