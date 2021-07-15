<?php

use yii\db\Migration;

/**
 * Class m210221_111304_customer
 */
class m210221_111304_customer extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');

        /* 创建表 */
        $this->createTable('{{%customer}}', [
            'id' => "int(11) NOT NULL AUTO_INCREMENT COMMENT '主键'",
            'name' => "varchar(255) NULL COMMENT '姓名'",
            'gender' => "tinyint(1) unsigned NULL DEFAULT '0' COMMENT '性别[0:未知;1:男;2:女]'",
            'home_phone' => "varchar(20) NULL DEFAULT '' COMMENT '家庭号码'",
            'mobile' => "varchar(20) NULL DEFAULT '' COMMENT '手机号码'",
            'address' => "varchar(255) NULL DEFAULT '' COMMENT '默认地址'",
            'extend' => "text(0) NULL COMMENT '客户参与活动扩展'",//参与活动：1、除去拒接挂断的客户都算入 参与客户
            'status' => "int(3) NULL DEFAULT '1' COMMENT '客户状态[-1:黑名单;0:新客户;1:A类客户;2:B类客户;3:C类客户;4:D类客户]'",
            //客户质量排名 A：订购一次签收一次 B：有过1-2的拒收 C：有过拒收，有过签收； D：客户签收过一次，然后一直拒收 黑名单：从没签收过客户
            'created_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '修改时间'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='客户表'");

        /* 索引设置 */


        /* 表数据 */

        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%customer}}');
        $this->execute('SET foreign_key_checks = 1;');
    }

}
