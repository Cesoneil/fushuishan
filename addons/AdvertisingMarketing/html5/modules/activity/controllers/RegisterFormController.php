<?php
namespace addons\AdvertisingMarketing\html5\modules\activity\controllers;
use addons\AdvertisingMarketing\html5\controllers\BaseController;


/**
 * 活动基础类
 * Class RegisterFormController
 * @package addons\AdvertisingMarketing\html5\modules\activity\controllers
 */
class RegisterFormController extends BaseController {



    public function actionIndex(){
        // 个人信息
        // p(Yii::$app->wechat->user);
        // p(Yii::$app->params['wechatMember']);
        //print_r(1);exit;
        $model= \common\models\backend\Member::findOne(['id'=>2]) ;

        return $this->render($this->action->id, [
            'model' => $model,
        ]);
    }
}