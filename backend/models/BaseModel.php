<?php
/**
 * @author pawn
 * @date
 */

namespace backend\models;

interface BaseModel
{
    /**
     * 数据列表查询
     * @author pawn
     * @param array $config
     * @date 2017年11月28日09:15:53
     */
    public static function listQuery($config = []);
}
