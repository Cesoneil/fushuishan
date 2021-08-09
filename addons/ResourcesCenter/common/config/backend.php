<?php

return [

    // ----------------------- 菜单配置 ----------------------- //
    'config' => [
        // 菜单配置
        'menu' => [
            'location' => 'addons', // default:系统顶部菜单;addons:应用中心菜单
            'icon' => 'fa fa-puzzle-piece',
        ],
        // 子模块配置
        'modules' => [
        ],
    ],

    // ----------------------- 快捷入口 ----------------------- //

    'cover' => [

    ],

    // ----------------------- 菜单配置 ----------------------- //

    'menu' => [
        [
            'title' => '管控中心',
            'route' => 'control/index',
            'icon' => 'fa fa-database',
            'params' => [
            
            ],
            'child' => [

            ],
        ],
            [
            'title' => '客源渠道',
            'route' => 'source/index',
            'icon' => 'fa-user-plus',
            'params' => [
            
            ],
            'child' => [

            ],
        ],
            [
            'title' => '资源平台',
            'route' => 'customer/index',
            'icon' => 'fa-users',
            'params' => [
            
            ],
            'child' => [

            ],
        ],
    
    ],

    // ----------------------- 权限配置 ----------------------- //

    'authItem' => [
        [
            'title' => '所有权限',
            'name' => '*',
        ],
    ],
];