<?php
/**
 * 文章管理模型
 * @author pawn
 * @date 2017年12月17日19:13:49
 */
namespace common\models;

class ArticleModel extends Model
{
    /**
     * 模型表单
     * @author pawn
     * @return string
     * @date 2017年12月16日14:21:21
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * 文章模型规则
     * @author pawn
     * @return array
     * @date 2017年12月17日19:14:01
     */
    public function rules()
    {
        return [
            [['title', 'cate_id'], 'required'],
            [['keywords', 'content', 'summary'], 'string'],
            ['comments', 'integer'],
            ['author', 'default', 'value'=>\Yii::$app->user->id]
        ];
    }

    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            'update' => ['title', 'cate_id', 'keywords', 'content']
        ]);
    }
}
