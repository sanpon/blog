<?php
/**
 * 基础模型用于前后端共享
 * @author pawn
 * @date
 */
namespace common\models;

use frontend\config\UrlManage;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\web\UrlManager;

class Model extends ActiveRecord
{
    /**
     * 行为控制
     * @author pawn
     * @return array
     * @date 2017年12月6日14:03:25
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['datetime']
                ]
            ]
        ];
    }

    /**
     * 后台设置前端路由
     * @author pawn
     * @param string $context
     * @param array $config
     * @return string
     * @date
     */
    public static function getFrontUrl(string $context, array $config = [])
    {
        $manage = UrlManage::rules();
        $urlManager = \Yii::$app->urlManager;

        $urlManager->enablePrettyUrl = $manage['enablePrettyUrl'];
        $urlManager->showScriptName = $manage['showScriptName'];
        $urlManager->baseUrl = $manage['baseUrl'];
        $urlManager->suffix = $manage['suffix'];
        $urlManager->addRules($manage['rules']);

        $detail = Html::a($context, $urlManager->createUrl($config), ['target'=>'_blank']);

        $urlManager->enablePrettyUrl = false;

         return $detail;
    }
}
