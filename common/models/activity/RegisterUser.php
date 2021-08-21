<?php
namespace common\models\activity;
use common\models\base\BaseModel;

/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/8/21
 * Time: 5:17 PM
 */

/**
 * This is the model class for table "fss_register_form_merchant_config".
 *
 * @property int $id 主键
 * @property int $merchant_id 商户ID
 * @property string $register_form_id 商户注册单ID
 * @property string $name 姓名
 * @property string $mobile 电话
 * @property int $province_id 省
 * @property int $city_id 城市
 * @property int $area_id 地区
 * @property string $address 地址
 * @property string $source 来源
 * @property int $created_at 创建时间
 * @property string $updated_at 修改时间
 */

class RegisterUser extends BaseModel{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%fss_register_form_merchant_config}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['merchant_id', 'header_img_show_mode', 'header_dynamic', 'register_number', 'click_number', 'status', 'created_at', 'updated_at'], 'integer'],
            [['agreement'], 'string', 'safe'],
            [['header_img', 'footer_img'], 'string'],
            [['uuid', 'merchant_name', 'title', 'support_phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_id' => '商户ID',
            'register_form_id' => '注册单ID',
            'name' => '您的姓名',
            'mobile' => '您的号码',
            'province_id' => '省',
            'city_id' => '市',
            'area_id' => '区',
            'address' => '地址',
            'source' => '来源',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}