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
class RegisterUser extends BaseModel
{

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
            ['name', 'match', 'pattern' => RegularHelper::isAllChinese(), 'message' => '请输入正确的姓名'],
            ['address', 'match', 'pattern' => RegularHelper::isAllChinese(), 'message' => '请输入正确的地址'],
            [['merchant_id','auto_mobile', 'register_form_id', 'mobile', 'province_id', 'city_id', 'area_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'address', 'source'], 'string'],
            [['name'], 'string', 'max' => 20],
            [['name','mobile','province_id','city_id','area_id','address'],'required'],
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
            'mobile' => '手机号码',
            'province_id' => '省',
            'city_id' => '市',
            'area_id' => '区',
            'address' => '地址',
            'source' => '来源',
            'auto_mobile' => '自动输入历史手机号',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    public static function DefaultValues()
    {

        return [
            ['id' => '8959834', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '党*兰', 'mobile' => '139****7715', 'province_id' => '四川省', 'city_id' => '雅安市', 'area_id' => '雨城区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959835', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '朱*俭', 'mobile' => '136****6640', 'province_id' => '河南省', 'city_id' => '新乡市', 'area_id' => '新乡县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959836', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '赵*海', 'mobile' => '158****9371', 'province_id' => '江苏省', 'city_id' => '徐州市', 'area_id' => '泉山区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959837', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '王*友', 'mobile' => '134****8835', 'province_id' => '河北省', 'city_id' => '唐山市', 'area_id' => '丰南区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959838', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '潘*容', 'mobile' => '133****7181', 'province_id' => '广西壮族自治区', 'city_id' => '北海市', 'area_id' => '银海区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959839', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '王*涵', 'mobile' => '138****3505', 'province_id' => '辽宁省', 'city_id' => '沈阳市', 'area_id' => '沈河区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959840', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '李*', 'mobile' => '151****1043', 'province_id' => '湖北省', 'city_id' => '黄冈市', 'area_id' => '英山县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959841', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '张*汪', 'mobile' => '136****4156', 'province_id' => '北京市', 'city_id' => '北京市', 'area_id' => '昌平区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959842', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '何*伟', 'mobile' => '180****9787', 'province_id' => '广东省', 'city_id' => '深圳市', 'area_id' => '福田区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959843', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '顾*玉', 'mobile' => '150****4612', 'province_id' => '上海市', 'city_id' => '上海市', 'area_id' => '嘉定区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959844', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '卢*山', 'mobile' => '199****3602', 'province_id' => '湖南省', 'city_id' => '邵阳市', 'area_id' => '双清区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959845', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '刘*仁', 'mobile' => '139****2549', 'province_id' => '内蒙古自治区', 'city_id' => '巴彦淖尔市', 'area_id' => '磴口县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959846', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '梁*如', 'mobile' => '139****6579', 'province_id' => '广西壮族自治区', 'city_id' => '梧州市', 'area_id' => '蒙山县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959847', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '曹*', 'mobile' => '139****1230', 'province_id' => '河南省', 'city_id' => '驻马店市', 'area_id' => '正阳县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959849', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '聂*根', 'mobile' => '158****0293', 'province_id' => '江西省', 'city_id' => '吉安市', 'area_id' => '新干县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959850', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '梁*生', 'mobile' => '187****1208', 'province_id' => '四川省', 'city_id' => '广元市', 'area_id' => '剑阁县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959851', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '高*贵', 'mobile' => '159****4766', 'province_id' => '陕西省', 'city_id' => '延安市', 'area_id' => '安塞区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959852', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '申*海', 'mobile' => '183****7715', 'province_id' => '河北省', 'city_id' => '邯郸市', 'area_id' => '磁县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959853', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '张*生', 'mobile' => '133****7807', 'province_id' => '浙江省', 'city_id' => '宁波市', 'area_id' => '慈溪市', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959854', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '刘*清', 'mobile' => '132****3210', 'province_id' => '广西壮族自治区', 'city_id' => '贺州市', 'area_id' => '平桂管理区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959855', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '刘*光', 'mobile' => '173****6978', 'province_id' => '四川省', 'city_id' => '南充市', 'area_id' => '顺庆区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959856', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '韩*强', 'mobile' => '130****1703', 'province_id' => '北京市门', 'city_id' => '北京市', 'area_id' => '门头沟区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959857', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '郑*亮', 'mobile' => '188****3146', 'province_id' => '安徽省', 'city_id' => '阜阳市', 'area_id' => '阜南县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959858', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '李*名', 'mobile' => '151****7228', 'province_id' => '贵州省', 'city_id' => '毕节地区', 'area_id' => '金沙县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959859', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '候*宽', 'mobile' => '139****3842', 'province_id' => '辽宁省', 'city_id' => '沈阳市', 'area_id' => '大东区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959860', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '徐*贵', 'mobile' => '183****3431', 'province_id' => '四川省', 'city_id' => '成都市', 'area_id' => '温江区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959861', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '叶*林', 'mobile' => '136****1119', 'province_id' => '上海市', 'city_id' => '上海市', 'area_id' => '黄浦区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959862', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '雄*安', 'mobile' => '132****4551', 'province_id' => '湖北省', 'city_id' => '孝感市', 'area_id' => '孝南区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959863', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '卫*初', 'mobile' => '139****9065', 'province_id' => '湖北省', 'city_id' => '黄冈市', 'area_id' => '英山县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959864', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '聂*宝', 'mobile' => '132****7797', 'province_id' => '吉林省', 'city_id' => '辽源市', 'area_id' => '东辽县', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959865', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '钱*芳', 'mobile' => '135****0546', 'province_id' => '吉林省', 'city_id' => '长春市', 'area_id' => '二道区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959866', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '朱*虎', 'mobile' => '178****0832', 'province_id' => '江西省', 'city_id' => '九江市', 'area_id' => '浔阳区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959867', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '倪*富', 'mobile' => '131****8159', 'province_id' => '浙江省', 'city_id' => '金华市', 'area_id' => '兰溪市', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959868', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '赵*华', 'mobile' => '133****3389', 'province_id' => '辽宁省', 'city_id' => '葫芦岛市', 'area_id' => '连山区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959869', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '宋*和', 'mobile' => '137****0835', 'province_id' => '河南省', 'city_id' => '焦作市', 'area_id' => '解放区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959870', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '候*新', 'mobile' => '186****8152', 'province_id' => '河南省', 'city_id' => '郑州市', 'area_id' => '金水区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959871', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '孙*生', 'mobile' => '135****6584', 'province_id' => '黑龙江省', 'city_id' => '哈尔滨市', 'area_id' => '阿城区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959872', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '厚*荣', 'mobile' => '135****6188', 'province_id' => '河北省', 'city_id' => '石家庄市', 'area_id' => '栾城区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
            ['id' => '8959873', 'merchant_id' => 1, 'register_form_id' => 2, 'name' => '仇*英', 'mobile' => '137****3818', 'province_id' => '河北省', 'city_id' => '石家庄市', 'area_id' => '井陉矿区', 'address' => '', 'source' => 1, 'created_at' => 1633888272, 'updated_at' => 0],
        ];
    }
}
