<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/2/16
 * Time: 6:23 PM
 */
namespace common\models\customer;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%customer_activities}}".
 *
 * @property int $id 主键
 * @property int $name 活动名称
 * @property double $money 活动金额
 * @property string $activity_script 活动话术
 * @property string $detail 活动产品介绍
 * @property int $status 状态[-1:删除;0:禁用;1启用]
 * @property string $created_at 创建时间
 * @property string $updated_at 修改时间
 */

class Activities extends ActiveRecord{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%customer_activities}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['money'], 'number'],
            [['name', 'money', 'activity_script'], 'required'],
            [['name', 'activity_script','detail'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '活动名称',
            'money' => '活动金额',
            'activity_script' => '活动话术',
            'detail' => '活动介绍',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
