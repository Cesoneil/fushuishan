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
            /** ------ 基础模块 ------ **/
            'base' => [
                'class' => 'addons\AdvertisingMarketing\merchant\modules\base\Module',
            ],
        ],
    ],

    // ----------------------- 快捷入口 ----------------------- //

    'cover' => [

    ],

    // ----------------------- 菜单配置 ----------------------- //

    'menu' => [
        [
            'title' => '注册单推广',
            'route' => 'base/register-form-config/index',
            'icon' => 'fa fa-pencil-square-o',
            'params' => [

            ],
            'child' => [

            ],
        ],

    ],

    // ----------------------- 权限配置 ----------------------- //

    'authItem' => [
        [
            'title' => '注册单推广',
            'name' => 'function',
            'child' => [
                [
                    'title' => '注册单列表',
                    'name' => 'RegisterForm',
                    'child' => [
                        [
                            'title' => '注册单首页',
                            'name' => 'base/register-form-config/index',
                        ],
                        [
                            'title' => '注册单新增/编辑',
                            'name' => 'base/register-form-config/edit',
                        ],
                        [
                            'title' => '注册单删除',
                            'name' => 'base/register-form-config/delete',
                        ],
                        [
                            'title' => '注册单状态修改',
                            'name' => 'base/register-form-config/ajax-update',
                        ],
                        [
                            'title' => '查看注册用户',
                            'name' => 'base/register-user/index',
                        ],
                    ],
                ],
            ]
        ],
    ],
];