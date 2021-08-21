<?php

namespace common\models\common;


/**
 * This is the model class for table "fss_common_service_agreements".
 *
 * @property string $uuid 主键
 * @property string $cate 协议类别
 * @property string $detail_cate 协议所属
 * @property string $agreement 协议内容
 * @property int $status 状态[-1:删除;0:禁用;1启用]
 * @property int $created_at 创建时间
 * @property string $updated_at 修改时间
 */
class ServiceAgreements extends \common\models\base\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%common_service_agreements}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['agreement'],'string', 'safe'],
            [['uuid', 'cate', 'detail_cate'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uuid' => 'UUID',
            'cate' => '协议类别',
            'detail_cate' => '协议所属',
            'agreement' => '协议内容',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getAgreementContent()
//    {
//        return $this->hasOne(Member::class, ['cate' => 'cate','detail_cate' => 'detail_cate']);
//    }

}
