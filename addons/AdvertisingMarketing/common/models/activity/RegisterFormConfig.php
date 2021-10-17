<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/8/20
 * Time: 9:42 PM
 */
namespace addons\AdvertisingMarketing\common\models\activity;
use common\behaviors\MerchantBehavior;

/**
 * This is the model class for table "fss_addon_register_form_merchant_config".
 *
 * @property int $id 主键
 * @property int $merchant_id 商户id
 * @property string $popularize_img 推广图片
 * @property string $popularize_title 推广标题
 * @property string $merchant_name 商户展示名称
 * @property string $title 标题
 * @property string $header_img 头部图片
 * @property int $header_img_show_mode 头部图片展示方式[1:排列展示;2:轮播展示]
 * @property int $header_dynamic 头部动态[0:不展示；1:只展示动态;2:只展示人数;3:全部展示]
 * @property string $agreement 商家协议内容//如果为空使用默认协议
 * @property string $footer_img 尾部图片
 * @property string $support_phone 咨询电话
 * @property int $register_number 注册数量
 * @property int $click_number 点击数量
 * @property int $status 状态[-1:删除;0:禁用;1启用]
 * @property int $created_at 创建时间
 * @property string $updated_at 修改时间
 */
class RegisterFormConfig extends \common\models\base\BaseModel
{

    //use MerchantBehavior;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%addon_register_form_merchant_config}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id', 'header_img_show_mode', 'header_dynamic', 'register_number', 'click_number', 'status', 'created_at', 'updated_at'], 'integer'],
            [['agreement'], 'string'],
            [['popularize_title','popularize_img','title','header_img'],'required'],
            [['header_img','title','popularize_title', 'popularize_img','footer_img'], 'string'],
            [['merchant_name', 'support_phone'], 'string', 'max' => 50],
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
            'merchant_name' => '商户展示名称',
            'popularize_title' => '推广标题',
            'popularize_img' => '推广图片',
            'title' => '页面标题',
            'header_img' => '头部图片',
            'header_img_show_mode' => '头部图片展示方式',//[1:排列展示;2:轮播展示]
            'header_dynamic' => '头部动态',//[0:不展示；1:只展示领取动态;2:只展示领取人数;3:全部展示]
            'agreement' => '协议内容',//如果为空使用默认协议
            'footer_img' => '尾部图片',
            'support_phone' => ' 咨询电话',
            'register_number' => '注册人数',
            'click_number' => '访问人数',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

}
