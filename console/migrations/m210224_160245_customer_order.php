<?php

use yii\db\Migration;

/**
 * Class m210224_160245_customer_order
 */
class m210224_160245_customer_order extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');

        /* 创建表 */
        $this->createTable('{{%customer_order}}', [
            'id' => "int(11) NOT NULL AUTO_INCREMENT COMMENT '主键'",
            'activity_id' => "int(10) unsigned NULL DEFAULT '0' COMMENT '活动ID'",
            'express_id' => "int(5) NULL DEFAULT '0' COMMENT '快递公司ID'",
            'express_no' => "char(32) NULL DEFAULT '' COMMENT '快递单号'",
            'status' => "tinyint(1) NULL DEFAULT '0' COMMENT '快递状态[0:运送中;1:派送中;2:签收;3:拒收;4:退回]'",
            'express_information' => "varchar(150) NULL DEFAULT '' COMMENT '快递问题反馈信息'",
            'courier_mobile' => "varchar(64) NULL DEFAULT '' COMMENT '当前快递员电话'",
            'amount' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '运单金额'",
            'real_amount' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '最后实际金额'",
            'name' => "char(32) NULL DEFAULT '' COMMENT '姓名'",
            'mobile' => "varchar(20) NULL DEFAULT '' COMMENT '电话'",
            'address' => "varchar(64) NULL DEFAULT '' COMMENT '地址'",
            'customer_id' => "int(10) NULL DEFAULT '0' COMMENT '客户ID'",
            'bm_id' => "int(10) NULL DEFAULT '0' COMMENT '所属客服ID'",
            'is_contact' => "smallint(3) NULL DEFAULT '0' COMMENT '是否联系客户[0:否;1:是]'",
            'processing_count' => "smallint(3) NULL DEFAULT '0' COMMENT '处理次数'",
            'processing_doc' => "text(0) NULL COMMENT '处理情况{1:处理结果;2:处理结果...}'",
            'remarks' => "varchar(50) NULL DEFAULT '' COMMENT '备注'",
            'created_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '创建日期'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='用户_订单表'");

        /* 索引设置 */
        $this->createIndex('activity_id','{{%customer_order}}','activity_id',0);
        $this->createIndex('bm_id','{{%customer_order}}','bm_id',0);
        $this->createIndex('customer_id','{{%customer_order}}','customer_id',0);
        $this->createIndex('status','{{%customer_order}}','status',0);


        /* 表数据 */

        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');

        /**
         * 需要在处理页面显示官方

         */
        /*

        跟单信息：最后时间，客户问题
        客户ID （空的情况下可以手动修改为关联客户）
        是否及时联系客户取货：是/否
        处理次数：
        跟单处理情况:{1:处理结果；2：处理结果；3：处理结果………}
        订单备注

        快递状态：0运送中，1正在派送（正在派送，有问题派送）、2签收、3拒收、4退回
         */
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%customer_order}}');
        $this->execute('SET foreign_key_checks = 1;');
    }

}
