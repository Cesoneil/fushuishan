<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'html5',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'html5\controllers',
    'bootstrap' => ['log'],
    'modules' => [
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-html5',
        ],
        'user' => [
            'identityClass' => 'common\models\member\Member',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-html5', 'httpOnly' => true],
            'loginUrl' => ['site/login'],
            'idParam' => '__html5',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the html5
            'name' => 'advanced-html5',
            'timeout' => 86400,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@runtime/logs/' . date('Y-m/d') . '.log',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function($event) {
                Yii::$app->services->log->record($event->sender);
            },
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
    'params' => $params,
];
