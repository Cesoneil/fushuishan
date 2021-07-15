<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/2/28
 * Time: 4:39 PM
 */
namespace common\models\customer;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%customer_order}}".
 *
 * @property int $id 主键
 * @property int $activity_id 活动ID
 * @property int $express_id 快递公司ID
 * @property string $express_no 快递单号
 * @property int $status 快递状态[0:运送中;1:派送中;2:签收;3:拒收;4:退回]
 * @property string $express_information 快递问题反馈信息
 * @property string $courier_mobile 当前快递员电话
 * @property double $amount 运单金额
 * @property double $real_amount 最后实际金额
 * @property string $name 姓名
 * @property string $mobile 联系电话【可以是手机或者是座机】
 * @property string $address 运单地址
 * @property int $customer_id 客户ID[客户ID可以手动进行修改]
 * @property int $bm_id 所属客服ID
 * @property int $is_contact 是否联系及时取货[0:否;1:是]
 * @property int $processing_cout 处理次数
 * @property string $processing_doc 处理情况{1:处理结果;2:处理结果...}
 * @property string $remarks 订单信息备注
 * @property string $created_at 创建日期
 */

class Order extends ActiveRecord{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer_order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity_id','status','express_id','customer_id','bm_id','is_contact','processing_count','created_at'], 'integer'],
            [['amount','real_amount'], 'number'],
            [['name', 'mobile', 'address','bm_id'], 'required'],
            [['name', 'address','express_no','express_information','courier_mobile','processing_doc','remarks'], 'string'],
            [['mobile'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity_id' =>'活动ID',
            'express_id' => '快递公司ID',
            'express_no' => '快递单号',
            'status' => '快递状态',//[0:运送中;1:派送中;2:签收;3:拒收;4:退回]
            'express_information' => '快递问题反馈信息',
            'courier_mobile' => '当前快递员电话',
            'amount' => '运单金额',
            'real_amount' => '最后实际金额',
            'name' => '姓名',
            'mobile' => '电话',   //可以是手机或者是座机
            'address' => '地址',
            'customer_id' =>'客户ID', //可以手动修改
            'bm_id' => '所属客服ID',
            'is_contact' => '是否联系客户及时取货',   //[0:否;1:是]
            'processing_count' => '处理次数',
            'processing_doc' => '处理情况', //{1:处理结果;2:处理结果...}
            'remarks' => '备注',
            'created_at' => '创建日期'
            ];
    }
}