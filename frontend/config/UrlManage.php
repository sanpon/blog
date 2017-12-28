<?php
/**
 * @author pawn
 * @date
 */

namespace frontend\config;

class UrlManage
{
    public static function rules()
    {
        return [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '',
            'suffix' => '.html',
            'rules' => [
                'login' => 'site/login',
                'logout' => 'site/logout',
                'sign' => 'site/sign',
                'captcha' => 'site/captcha',
                '<modules:\w+>' => '<modules>/default/index',
                '<modules:\w+>/<id:\d+>' => '<modules>/default/detail'
            ],
        ];
    }
}