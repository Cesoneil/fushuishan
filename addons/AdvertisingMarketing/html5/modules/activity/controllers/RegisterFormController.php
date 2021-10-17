<?php
namespace addons\AdvertisingMarketing\html5\modules\activity\controllers;

use addons\AdvertisingMarketing\common\enums\RegisterFormDynamic;
use addons\AdvertisingMarketing\common\enums\RegisterFormModeEnum;
use addons\AdvertisingMarketing\common\models\activity\RegisterFormConfig;
use addons\AdvertisingMarketing\common\models\activity\RegisterUser;
use addons\AdvertisingMarketing\html5\controllers\BaseController;
use addons\AdvertisingMarketing\html5\modules\activity\forms\RegisterForm;
use common\enums\StatusEnum;
use common\helpers\StringHelper;
use services\common\ProvincesService;
use yii\bootstrap\Carousel;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * 活动基础类
 * Class RegisterFormController
 * @package addons\AdvertisingMarketing\html5\modules\activity\controllers
 */
class RegisterFormController extends BaseController
{
    /**
     * @var int
     */
    public $number = 532;

    /**
     * @var int
     */
    public $length = 40;

    /**
     * @return string
     */
    public function actionIndex()
    {
        //获取活动配置信息
        $request = Yii::$app->request;
        $register_form_id = $request->get('register_config_id', '');
        $source = $request->get('source', 2);
        $register_config = RegisterFormConfig::find()->where(['id' => $register_form_id,'status'=>StatusEnum::ENABLED])->one();
        $register_config->header_img = explode(',', $register_config->header_img);
        $register_config->footer_img = explode(',', $register_config->footer_img);
        $register_number = $register_config->register_number;
        $register_config->register_number = $register_number < $this->number ? $this->number + $register_number : $register_number; //设置最低显示人数；

        //头部图片展示方式
        $mode = $register_config->header_img_show_mode;
        $range = $mode == RegisterFormModeEnum::RANGE ?? 0;
        $result = $range ? '' : [];
        foreach ($register_config->header_img as $header_img) {
            if ($range) {
                $result .= '<img class="user-image" src="' . $header_img . '"/>';   //排列展示
            } else {
                $result[] = ['content' => '<img src=' . $header_img . ' />'];   //轮播展示
            }
        }
        $header_ui = $range ? $result : Carousel::widget(['items' => $result, 'controls' => false,]);  //轮播组件
        //头部图片展示方式

        //设置领取展示动态
        $users_info = '';
        $header_dynamic = $register_config->header_dynamic;
        if ($header_dynamic == RegisterFormDynamic::ALL || $header_dynamic == RegisterFormDynamic::DYNAMIC) {
            $register_users = RegisterUser::find()->where(['register_form_id' => $register_form_id])->orderBy(['created_at' => 'desc'])->asArray()->limit($this->length)->all();//轮播38个
            $register_users = count($register_users) < $this->length ? array_merge($register_users, RegisterUser::DefaultValues()) : $register_users;
            $province = new ProvincesService();
            foreach ($register_users as $key => $user) {
                $time = rand(1, 9);
                $user['name'] = StringHelper::hideStr($user['name'], 1, 1);
                $user['mobile'] = StringHelper::hideStr($user['mobile'], 3);
                $user['city_id'] = is_numeric($user['city_id']) ? $province->getName($user['city_id']) : $user['city_id'];
                $users_info .= '<div class="itemq"><i class="fa fa-xxx">  📣  📣</i><span class="focus-info"> ' . $user['city_id'] . ' ' . $user['name'] . ' ' . $user['mobile'] . ' ' . $time . '</span>分钟前已领取</div>';
            }

        }
        //设置领取展示动态

        //表单内容
        $model = new RegisterForm();
        $cache = Yii::$app->cache->get('users');
        if (!empty($cache)) {
            $model = $model->getRegisterUserInfo($cache['id']);
            $model->name = StringHelper::hideStr($model->name, 1, 1);
            $model->mobile = StringHelper::hideStr($model->mobile, 3);
        }
//        p($model);exit;   //缓存显示有一点点问问题
        return $this->render($this->action->id, [
            'model' => $model,
            'register_config' => $register_config,
            'header_ui' => $header_ui,
            'users_info' => $users_info,
            'source' => $source
        ]);
    }


    /**
     * ajax提交信息跳转
     * @return mixed|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionAjaxRegister()
    {
        $request = Yii::$app->request;
        $model = new RegisterForm();
        if ($model->load($request->post()) && $model->validate()) {
            $result = $model->registerSave($request);
            if ($result) {
                Yii::$app->cache->set('users', ['id' => $result]);
                Yii::$app->getSession()->setFlash('success', '下单成功');
                return $this->redirect(['success']);
            } else {
                throw new NotFoundHttpException($this->getError($model));
            }
        }
        return $this->message($this->getError($model), $this->redirect(Yii::$app->request->referrer), 'error');
    }




    public function actionSuccess()
    {
        return $this->render($this->action->id,[]);
    }
}