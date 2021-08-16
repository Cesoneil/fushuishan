<?php
namespace html5\modules\activity\controllers;
use html5\controllers\BaseController;

/**
 * 活动基础类
 * Class ActivityController
 * @package html5\modules\activity\controllers
 */
class RegisterFormController extends BaseController {



    public function actionIndex(){
        // 个人信息
        // p(Yii::$app->wechat->user);
        // p(Yii::$app->params['wechatMember']);
        return $this->render($this->action->id, [
        ]);
    }
}