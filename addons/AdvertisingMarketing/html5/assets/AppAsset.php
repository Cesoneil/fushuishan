<?php

namespace addons\AdvertisingMarketing\html5\assets;

use yii\web\AssetBundle;

/**
 * 静态资源管理
 *
 * Class AppAsset
 * @package addons\AdvertisingMarketing\html5\assets
 */
class AppAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@addons/AdvertisingMarketing/html5/';
    public $css = [
        'resources/css/zhucedan.css'
    ];

    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}