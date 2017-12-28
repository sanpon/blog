<?php
namespace backend\modules\Index\models;

use backend\modules\Article\models\Article;
use backend\modules\Category\models\Category;
use common\models\Model;

/**
 * @author pawn
 * @date
 */
class Index extends Model
{
    /**
     * 查询最近一周发布的10篇文章
     * @author pawn
     * @return array|\yii\db\ActiveRecord[]
     * @date 2017年12月28日14:50:42
     */
    public static function getRecentArticle()
    {
        //最近一周发布的10篇文章
        $recentTime = strtotime('-7 day', strtotime(date('Y-m-d', time())));
        $limit = 10;

        $article = Article::find()
            ->select([
                'id'=>'article_id',
                'title',
                'cate.name',
                'this.datetime',
            ])
            ->alias('this')
            ->leftJoin(['cate'=>Category::tableName()], 'cate.cate_id=this.cate_id')
            ->where(['>=', 'this.datetime', $recentTime])
            ->limit($limit)->asArray()->all();
        return $article;
    }
}