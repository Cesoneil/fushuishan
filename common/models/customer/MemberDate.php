<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/3/1
 * Time: 11:23 PM
 */
namespace common\models\customer;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%backend_member_data}}".
 *
 * @property int $id 主键
 * @property int $is_work 是否出勤[0:否;1:是]
 * @property int $bm_id 客服ID
 * @property int $call_totals 呼叫总数
 * @property int $answer_number 应答数
 * @property int $success_number 成功数
 * @property double $success_rate 成功率
 * @property double $average_duration 平均通话时长
 * @property double $total_duration 通话总时长
 * @property string $created_at 创建日期
 */

class MemberDate extends ActiveRecord{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%backend_member_data}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bm_id','is_work','call_totals','answer_number','success_number','created_at'], 'integer'],
            [['success_rate','average_duration','total_duration'], 'number'],
            [['bm_id'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'is_work' => '是否出勤',
            'bm_id' => '客服ID',
            'call_totals' => '呼叫总数',
            'answer_number' => '应答数',
            'success_number' => '成功数',
            'success_rate' => '成功率',
            'average_duration' => '平均通话时长',
            'total_duration' => '通话总时长',
            'created_at' => '创建时间'
        ];
    }
}