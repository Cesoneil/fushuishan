<?php

return [

    // ----------------------- 菜单配置 ----------------------- //
    'config' => [
        // 菜单配置
        'menu' => [
            'location' => 'default', // default:系统顶部菜单;addons:应用中心菜单
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
            'title' => '入驻商户',
            'route' => 'business/index',
            'icon' => 'fa fa-handshake-o',
            'params' => [
            
            ],
            'child' => [

            ],
        ],
            [
            'title' => '注册单营销',
            'route' => 'register-form/index',
            'icon' => 'a fa-pencil-square-o',
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