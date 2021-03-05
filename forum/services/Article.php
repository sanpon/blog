<?php
/**
 * 后台文章管理模型
 * @author pawn
 * @date 2017年12月16日14:22:03
 */
namespace backend\services;

use backend\modules\category\models\Category;
use common\models\ArticleModel;
use common\models\MembersModel;
use library\core\Page;

class Article extends ArticleModel
{
    /**
     * 文章列表数据
     * @author pawn
     * @param array $config
     * @return Page
     * @date 2017年12月17日19:49:01
     */
    public static function listQuery($config = [])
    {
        $article = static::find()
            ->select([
                'this.*',
                'cate' => 'cate.name',
                'username'
            ])
            ->alias('this')
            ->leftJoin(['cate'=>Category::tableName()], 'cate.cate_id=this.cate_id')
            ->leftJoin(['mem'=>MembersModel::tableName()], 'mem.uid=this.author')
            ->orderBy(['article_id'=>SORT_DESC]);
        return new Page($article, [
            'asArray' => true
        ]);
    }

    /**
     * 数据入库预处理
     * @author pawn
     * @param bool $insert
     * @return bool
     * @date 2017年12月19日16:51:27
     */
//    public function beforeSave($insert)
//    {
//        //获取纯文本信息
//        $this->summary = Strings::substring($this->getSummary($this->content), 600, '......');
//
//        return parent::beforeSave($insert);
//    }

    /**
     * 抓取文章的正文信息
     * @author pawn
     * @param string $content
     * @return string
     * @date 2017年12月29日00:05:13
     */
    private function getSummary(string $content):string
    {
        //删除pre代码块
//        $content = preg_replace('/<pre[^>]*>[^>]*<\/pre>/', '', $content);
        //删除前置p标签
        $content = preg_replace('/<(\/?[a-z]+)[^>]*>/i', '', $content);
        //清除代码中的空格以及后置p标签
        return preg_replace('/(\s|&nbsp;)/', '', $content);
    }
}
