<?php
/**
 * 区域管理模型
 * @author pawn
 * @date 2017年7月27日10:34:56
 */
namespace backend\modules\Tool\models;

use yii\db\ActiveRecord;

class District extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%district}}';
    }

    public function rules()
    {
        return [
            [['id', 'name', 'parent_id'], 'required'],
            ['name', 'string'],
            ['id', 'parent_id', 'sort', 'number']
        ];
    }

    /**
     * 搜索地址信息
     * @author pawn
     * @param int $parent_id
     * @return array
     * @date 2017年8月3日21:37:18
     */
    public static function search(int $parent_id = 0):array
    {
        $district = District::find()
            ->select(['id', 'name'])
            ->where(['parent_id'=>$parent_id])
            ->orderBy(['sort'=>SORT_DESC])
            ->asArray()->all();
        return $district;
    }
}






























