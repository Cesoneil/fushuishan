<?php

namespace addons\ResourcesCenter\frontend\controllers;

use Yii;
use common\controllers\AddonsController;

/**
 * 默认控制器
 *
 * Class DefaultController
 * @package addons\ResourcesCenter\frontend\controllers
 */
class BaseController extends AddonsController
{
    /**
    * @var string
    */
    public $layout = "@addons/ResourcesCenter/frontend/views/layouts/main";
}