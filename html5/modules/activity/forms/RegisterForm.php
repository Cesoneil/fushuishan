<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/8/18
 * Time: 12:26 AM
 */
namespace html5\forms;

use yii\base\Model;

class RegisterForm extends Model{

    public $name;
    public $mobile;
    public $address;
    public $source;

//* @property string $register_form_id 商户注册单ID
//* @property string $name 姓名
//* @property string $mobile 电话
//* @property int $province_id 省
//* @property int $city_id 城市
//* @property int $area_id 地区
//* @property string $address 地址
//* @property string $source 来源
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'mobile', 'address', 'channel'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => '您的姓名 您的电话（以加密，放心填写）*',
        ];
    }
}


