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
            'activity' => [
                'class' => 'addons\AdvertisingMarketing\html5\modules\activity\Module'
            ],
        ],
        'controllerMap' => [
            // 'file' => 'common\controllers\FileBaseController', // 文件上传公共控制器
            //'ueditor' => 'common\widgets\ueditor\UeditorController', // 百度编辑器
            'provinces' => 'common\widgets\provinces\ProvincesController', // 省市区
            // 'select-map' => 'common\widgets\selectmap\MapController', // 经纬度选择
            // 'cropper' => 'common\widgets\cropper\CropperController', // 图片裁剪
            // 'notify' => 'backend\widgets\notify\NotifyController', // 消息
        ],
    ],

    // ----------------------- 快捷入口 ----------------------- //

    'cover' => [
        [
            'title' => '注册单推广页面',
            'route' => 'activity/register-form/index',
            'icon' => 'fa-pencil-square-o',
            'params' => [
            
            ],
        ],
    
    ],

    // ----------------------- 菜单配置 ----------------------- //

    'menu' => [

    ],

    // ----------------------- 权限配置 ----------------------- //

    'authItem' => [
    ],
];