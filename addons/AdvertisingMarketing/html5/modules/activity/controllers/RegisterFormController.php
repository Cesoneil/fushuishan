<?php
namespace addons\AdvertisingMarketing\html5\modules\activity\controllers;

use addons\AdvertisingMarketing\common\enums\RegisterFormDynamic;
use addons\AdvertisingMarketing\common\enums\RegisterFormModeEnum;
use addons\AdvertisingMarketing\common\models\activity\RegisterFormConfig;
use addons\AdvertisingMarketing\common\models\activity\RegisterUser;
use addons\AdvertisingMarketing\html5\controllers\BaseController;
use addons\AdvertisingMarketing\html5\modules\activity\forms\RegisterForm;
use common\enums\StatusEnum;
use common\helpers\ArrayHelper;
use common\helpers\StringHelper;
use common\helpers\ToolsHelper;
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
        $source = $request->get('source', '')?$request->get('source', ''): ToolsHelper::getBrowser();//获取浏览器agent的值
        $register_config = RegisterFormConfig::find()->where(['id' => $register_form_id, 'status' => StatusEnum::ENABLED])->one();
        if ($register_config) {
            //表单内容
            $model = new RegisterForm();
            $cache = Yii::$app->session->get('users');
            $ip = ToolsHelper::ip();
            if (!empty($cache)) {
                $model = $model->getRegisterUserInfo($cache['id']);
                $model->name = StringHelper::hideStr($model->name, 1, 1);
                $model->mobile = StringHelper::hideStr($model->mobile, 3);
            } else {
                $ips = Yii::$app->cache->get('visit_users_ip');
                if (empty($ips) || !isset($ips[$register_form_id]) || !in_array($ip, $ips[$register_form_id])) {
                    $register_config->click_number = $register_config->click_number+1;
                    if ($register_config->save()) {                   //增加有效访问量
                        isset($ips[$register_form_id]) ? array_push($ips[$register_form_id], $ip) : $ips[$register_form_id][] = $ip;//把用户ip放入缓存
                        Yii::$app->cache->set('visit_users_ip', $ips);//放入缓存中
                    }
                }
            }
        }

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

        //这里需要获取用户的数量和 配置访问数需要做统计，ip地址需要分析，

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

        //if cache为空或者缓存的ip和浏览器信息为空为有效值，并设置缓存
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
                Yii::$app->session->set('users', ['id' => $result]);
                return $this->redirect(['success']);
            } else {
                throw new NotFoundHttpException($this->getError($model));
            }
        }
        return $this->message($this->getError($model), $this->redirect(Yii::$app->request->referrer), 'error');
    }


    /**
     * @return string
     */
    public function actionSuccess()
    {
        //获取个人的ID信息内容，和商家的二维码图片//等待调整
        return $this->render($this->action->id);
    }
}