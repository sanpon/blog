<?php
/**
 * 分类管理
 * @author pawn
 * @date 2017年11月28日12:20:48
 */
namespace common\models;

use vendor\toolkit\library\Recursive;

class CategoryModel extends Model
{
    //分类名称
    const NAME = 1;

    //分类别名
    const NICKNAME = 2;
    /**
     * 模型表名称
     * @author pawn
     * @return string
     * @date 2017年11月28日12:32:46
     */
    public static function tableName()
    {
        return '{{%category}}';
    }



    /**
     * 分类模型规则
     * @author pawn
     * @return array
     * @date 2017年11月28日12:33:05
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'unique', 'message'=>'{attribute}已经存在'],
            ['name', 'string', 'length'=>[1, 50]],
            ['nickname', 'string', 'length'=>[1, 60]],
            [['pid'], 'integer'],
            [['pid'], 'default', 'value'=>0],
            ['type', 'in', 'range'=>[self::NAME, self::NICKNAME]],
            ['type', 'default', 'value'=>self::NAME],
        ];
    }

    /**
     * 属性标签
     * @author pawn
     * @return array
     * @date 2017年12月6日14:03:51
     */
    public function attributeLabels()
    {
        return [
            'name' => '分类名称',
            'nickname' => '分类别名',
            'type' => '名称显示方式'
        ];
    }

    /**
     * 查询分类
     * @author pawn
     * @param int $pid 是否查询所有分类 -1 全部 >-1根据ID进行查询
     * @return array
     * @date 2017年12月15日01:15:01
     */
    public static function getCategory($pid = -1)
    {
        $query = static::find()
            ->select(['this.*', 'total'=>'count(cate.cate_id)'])
            ->alias('this');

        //是否查询所有分类
        if ($pid>-1) {
            $query = $query->where(['this.pid'=>$pid]);
        }

        return $query->leftJoin(['cate'=>static::tableName()], 'this.cate_id=cate.pid')
            ->groupBy(['this.cate_id'])
            ->orderBy(['this.datetime'=>SORT_ASC])
            ->asArray()->all();
    }

    /**
     * 获取分类树
     * @author pawn
     * @param int $pid 需要查询的子集
     * @return array
     * @date 2017年12月15日00:53:32
     */
    public static function getCategoryTree($pid = 0)
    {
        $category = static::getCategory();
        return Recursive::childTree('cate_id', $category, $pid);
    }
}
