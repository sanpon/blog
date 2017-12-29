<?php
/**
 * @author pawn
 * @date
 */

namespace frontend\modules\Article\models;

use common\models\ArticleModel;
use frontend\modules\Category\models\Category;
use frontend\modules\Members\models\Members;
use yii\helpers\Url;

class Article extends ArticleModel
{

    public static function getList()
    {
        $list = static::find()
            ->select([
                'id' => 'article_id',
                'title',
                'summary',
                'keywords',
                'comments',
                'datetime'
            ])
            ->limit(10)
            ->asArray()->all();
        array_walk($list, function (&$val) {
            $val['url'] = Url::to(['default/detail', 'id'=>$val['id']]);
            $val['datetime'] = date('Y年m月d日 H:i:s', $val['datetime']);
            $val['keywords'] = $val['keywords'] ? explode(',', $val['keywords']) : [];
        });
        return $list;
    }

    /**
     * 查询文章详情
     * @author pawn
     * @param int $articleId
     * @return array|null|\yii\db\ActiveRecord
     * @throws \Exception
     * @date 2017年12月18日02:21:34
     */
    public static function getDetail(int $articleId = 0)
    {
        //文章信息
        $article = static::find()
            ->select([
                'id' => 'this.article_id',
                'title',
                'keywords',
                'cid' => 'this.cate_id',
                'category' => 'cate.name',
                'content',
                'comments',
                'this.datetime'
            ])
            ->alias('this')
            ->leftJoin(['author'=>Members::tableName()], 'this.author=author.uid')
            ->leftJoin(['cate'=>Category::tableName()], 'this.cate_id=cate.cate_id')
            ->where(['article_id'=>$articleId])
            ->asArray()
            ->one();

        if (empty($article)) {
            throw new \Exception('抱歉,没有这样的文章或已经被删除');
        }

        //处理文章数据
        $article['datetime'] = date('Y.m.d H:i:s', $article['datetime']);
        $article['keywords'] = $article['keywords'] ? explode(',', $article['keywords']) : [];

        return array_merge($article, static::getAdjacentArticle($articleId));
    }

    /**
     * 获取文章的上一篇和下一篇
     * @author pawn
     * @param int $articleId
     * @return array
     * @date 2017年12月18日18:30:44
     */
    public static function getAdjacentArticle(int $articleId):array
    {
        //上一篇
        $prev = static::find()->where(['<', 'article_id', $articleId])->orderBy(['article_id'=>SORT_DESC])->one();

        //下一篇
        $next = static::find()->where(['>', 'article_id', $articleId])->orderBy(['article_id'=>SORT_ASC])->one();

        return [
            'prev' => $prev ? [
                'id' => $prev->article_id,
                'title' => $prev->title,
                'url' => Url::to(['detail', 'id'=>$prev->article_id])
            ] : [],
            'next' => $next ? [
                'id' => $next->article_id,
                'title' => $next->title,
                'url' => Url::to(['detail', 'id'=>$next->article_id])
            ] : []
        ];
    }
}