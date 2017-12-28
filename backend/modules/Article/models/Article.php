<?php
/**
 * 后台文章管理模型
 * @author pawn
 * @date 2017年12月16日14:22:03
 */
namespace backend\modules\Article\models;

use backend\models\BaseModel;
use backend\modules\Category\models\Category;
use backend\modules\Members\models\Members;
use common\models\ArticleModel;
use vendor\toolkit\library\Page;
use vendor\toolkit\library\Strings;
use vendor\toolkit\output\Json;

class Article extends ArticleModel implements BaseModel
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
            ->leftJoin(['mem'=>Members::tableName()], 'mem.uid=this.author')
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
    public function beforeSave($insert)
    {
        $images = Strings::getImages($this->content);
        if ($images) {
            $this->avatar = current($images);
            $this->thumbs = Json::encode($images);
        }

        return parent::beforeSave($insert);
    }
}
