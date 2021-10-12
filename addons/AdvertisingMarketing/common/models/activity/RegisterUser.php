<?php
namespace addons\AdvertisingMarketing\common\models\activity;
use common\behaviors\MerchantBehavior;
use common\helpers\RegularHelper;
use common\models\base\BaseModel;
use services\common\ProvincesService;

/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/8/21
 * Time: 5:17 PM
 */

/**
 * This is the model class for table "fss_addon_register_form_users".
 *
 * @property int $id 主键
 * @property int $merchant_id 商户ID
 * @property int $register_form_id 商户注册单ID
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

    //use MerchantBehavior;

    const BAIDU = 1;
    const UC_AGENT = 2;

    /**
     * @var array
     */
    public static $source = [
        self::BAIDU => '百度推广',
        self::UC_AGENT => 'UC浏览器',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%addon_register_form_users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['mobile', 'match', 'pattern' => RegularHelper::mobile(), 'message' => '请输入正确的手机号码'],
            [['merchant_id', 'register_form_id', 'mobile', 'province_id', 'city_id', 'area_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'address','source'], 'string'],
            [['name'], 'string', 'max' => 20],
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