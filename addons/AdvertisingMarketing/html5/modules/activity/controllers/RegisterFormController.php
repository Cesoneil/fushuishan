<?php
namespace addons\AdvertisingMarketing\html5\modules\activity\controllers;
use addons\AdvertisingMarketing\common\models\activity\RegisterFormConfig;
use addons\AdvertisingMarketing\html5\controllers\BaseController;
use Yii;
use yii\filters\AccessControl;

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

        //获取活动配置信息
        $register_form_id = Yii::$app->request->get('register_config_id','');
        $model = RegisterFormConfig::find()->where(['id'=>$register_form_id])->one();
        p($model);
        $model= \common\models\backend\Member::findOne(['id'=>2]) ;

        return $this->render($this->action->id, [
            'model' => $model,
        ]);
    }
}