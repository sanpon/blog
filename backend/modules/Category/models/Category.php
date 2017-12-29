<?php
/**
 * 后台分类管理模型
 * @author pawn
 * @date 2017年11月28日12:46:22
 */
namespace backend\modules\Category\models;

use backend\models\BaseModel;
use common\models\CategoryModel;
use vendor\toolkit\library\Recursive;
use yii\db\ActiveRecord;

class Category extends CategoryModel implements BaseModel
{
    /**
     * 分类管理列表
     * @author pawn
     * @param int $pid
     * @return array
     * @date 2017年12月6日12:14:19
     */
    public static function listQuery($pid = 0)
    {
        $category = static::getCategory($pid);

        array_walk($category, function (&$value) {
            $value['datetime'] = date('Y.m.d H:i:s', $value['datetime']);

            $value['parents'] = (new static)->getParentsId($value['cate_id']);
            $value['class'] = $value['parents'];

            array_walk($value['class'], function (&$val) {
                $val = 'pid' . $val;
            });
            $value['level'] = count($value['parents']) - 1;
        });

        return $category;
    }

    /**
     * 根据分类ID查询父级ID
     * @author pawn
     * @param int $cate_id
     * @return array
     * @date 2017年12月12日12:45:13
     */
    private function getParentsId($cate_id = 0)
    {
        $category = static::getCategory();

        $tree = Recursive::familyTree('cate_id', $category, $cate_id);
        return array_column($tree, 'pid');
    }

    /**
     * 当前分类的新父级分类是否有效
     * @author pawn
     * @param ActiveRecord $model
     * @return bool
     * @date 2017年12月16日13:01:42
     */
    public static function canChangeParent(ActiveRecord $model)
    {
        $children = static::getCategoryTree($model->cate_id);
        $childrenNode = array_column($children, 'cate_id');
        array_push($childrenNode, $model->cate_id);
        $result = !in_array($model->pid, $childrenNode);

        if ($result==false) {
            $model->addError('pid', '不能将自身或子集作为父级分类');
        }

        return $result;
    }
}
