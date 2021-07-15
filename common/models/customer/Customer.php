<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/2/16
 * Time: 6:23 PM
 */
namespace common\models\customer;


use yii\db\ActiveRecord;
use common\helpers\RegularHelper;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property int $id 主键
 * @property int $name 姓名
 * @property int $gender 性别[0:未知;1:男;2:女]
 * @property string $home_phone 家庭号码
 * @property string $mobile 手机号码
 * @property string $address 默认住址 //可以备选修改地址
 * @property string $extend 客户参与活动扩展 //参与活动：1、除去拒接挂断的客户都算入 参与客户
 * @property int $status 客户状态【-1:黑名单;0:新客户;1:A类客户;2:B类客户;3:C类客户;4:D类客户】 //-1:黑名单;0:新客户;1:A类客户;2:B类客户;3:C类客户;4:D类客户 //客户质量排名 A：订购一次签收一次 B：有过1-2的拒收 C：有过拒收，有过签收； D：客户签收过一次，然后一直拒收 黑名单：从没签收过客户
 * @property string $created_at 创建时间
 * @property string $updated_at 修改时间
 */

class Customer extends ActiveRecord{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender'], 'number'],
            [['name'], 'required'],
            [['name','address','extend'], 'string'],
            [['id','gender','status', 'created_at', 'updated_at'], 'integer'],
            [['home_phone', 'mobile'], 'string', 'max' => 20],
            ['mobile', 'match', 'pattern' => RegularHelper::mobile(),'message' => '不是一个有效的手机号码'],
            [['mobile'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'gender' => '性别',
            'home_phone' => '家庭号码',
            'mobile' => '手机号码',
            'address' => '默认地址',
            'extend' => '客户参与活动扩展',
            'status' => '客户状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
