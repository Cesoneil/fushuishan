<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/8/18
 * Time: 12:26 AM
 */
namespace addons\AdvertisingMarketing\html5\modules\activity\forms;

use addons\AdvertisingMarketing\common\models\activity\RegisterFormConfig;
use addons\AdvertisingMarketing\common\models\activity\RegisterUser;
use common\helpers\RegularHelper;
use Http\Discovery\Exception\NotFoundException;
use Yii;
use yii\web\NotFoundHttpException;

class RegisterForm extends RegisterUser
{

    /**
     * @var bool
     */
    public $autoMobile = true;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['mobile', 'match', 'pattern' => RegularHelper::mobile(), 'message' => '请输入正确的手机号码'],
            ['name', 'match', 'pattern' => RegularHelper::isAllChinese(), 'message' => '请输入正确的姓名'],
            ['autoMobile', 'boolean'],
            [['name', 'mobile', 'province_id', 'city_id', 'area_id', 'address'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'name' => '您的姓名',
            'mobile' => '手机号码',
            'province_id' => '省',
            'city_id' => '市',
            'area_id' => '区',
            'address' => '地址',
            'source' => '来源',
            'autoMobile' => '自动输入历史手机号',
        ];
    }

    /**
     * 获取缓存信息
     * @param $id
     * @return null|static
     */
    public function getRegisterUserInfo($id)
    {
        return self::findOne(['id' => $id]);
    }

    /**
     * @param $request
     * @return bool|int
     */
    public function registerSave($request)
    {
        //这里需要对访问配置进行加法操作
        $post = $request->post();
        $register_config_id = $request->get('register_config_id', '');
        $register_config = RegisterFormConfig::findOne(['id' => $register_config_id]);
        if (!empty($post)) {
            $post['RegisterUser'] = $post['RegisterForm'];
            $post['RegisterUser']['source'] = $request->get('source', '');
            $post['RegisterUser']['register_form_id'] = $register_config_id;
            $post['RegisterUser']['merchant_id'] = $register_config['merchant_id'];
            unset($post['RegisterForm'], $post['RegisterUser']['autoMobile']);
        }
        $transaction = Yii::$app->db->beginTransaction();//开启事物
        try {
            $model = RegisterUser::findOne(['mobile' => $post['RegisterUser']['mobile']]);
            if (empty($model)) {
                $model = new RegisterUser();
                $register_config->register_number = $register_config->register_number++;
                $register_config->save();
            }
            if ($model->load($post) && $model->validate()&&$model->save()) {
                $transaction->commit();
                return $model->id ?? false;
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }
}


