<?php
/**
 * 后台用户模型
 * @author pawn
 * @date 2017年11月28日12:03:54
 */
namespace backend\modules\Members\models;

use backend\models\BaseModel;
use common\models\MembersModel;
use vendor\toolkit\Functions\Page;

class Members extends MembersModel implements BaseModel
{
    /**
     * 用户列表
     * @author pawn
     * @param array $query
     * @return Page
     * @date 2017年11月28日12:44:37
     */
    public static function listQuery($query = [])
    {
        $members = static::find()
            ->orderBy(['uid'=>SORT_DESC]);

        return new Page($members, ['route'=>['index']]);
    }
}