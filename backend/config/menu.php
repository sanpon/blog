<?php
/**
 * 后台菜单管理 以下链接配置默认pjax方式 配置pjax进行取消
 * @author pawn
 * @date 2017年8月14日23:02:00
 */
return [
    [
        'title' => '控制面板',
        'name' => 'dashboard',
        'icon' => 'icon-dashboard',
        'url' => ['/index/default/index'],
    ],
    [
        'title' => '博客管理',
        'name' => 'article',
        'icon' => 'icon-edit',
        'children' => [
            [
                'title' => '博文管理',
                'url' => ['/article/default/index'],
            ],
            [
                'title' => '文章分类',
                'url' => ['/category/default/index'],
            ]
        ]
    ],
    [
        'title' => '用户中心',
        'name' => 'members',
        'icon' => 'icon-users',
        'children' => [
            [
                'title' => '用户管理',
                'url' => ['/members/default/index'],
            ],
//            [
//                'title' => '角色管理',
//                'url' => ['/role/default/index'],
//            ]
        ]
    ],
    [
        'title' => '系统管理',
        'name' => 'system',
        'icon' => 'icon-system',
        'children' => [
            [
                'title' => '开发环境',
                'url' => ['/environment/default/index'],
            ],
            [
                'title' => '缓存管理',
                'url' => ['/cache/default/index'],
            ],
            [
                'title' => '地址管理',
                'url' => ['/district/default/index'],
            ],
            [
                'title' => 'SEO设置',
                'url' => ['/seo/default/index'],
            ],
            [
                'title' => '友情链接',
                'url' => ['/friends/default/index'],
            ],
            [
                'title' => '广告管理',
                'url' => ['/advertise/default/index'],
            ]
        ]
    ],
    [
        'title' => '消息管理',
        'name' => 'message',
        'icon' => 'icon-message',
        'children' => [
            [
                'title' => '网友牛评',
                'url' => ['/comment/default/index'],
            ],
            [
                'title' => '网友留言',
                'url' => ['/bbs/default/index'],
            ]
        ]
    ]
];
