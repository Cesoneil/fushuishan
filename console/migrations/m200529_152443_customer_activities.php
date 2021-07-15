<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/2/16
 * Time: 6:25 PM
 */
use yii\db\Migration;


class m200529_152443_customer_activities extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');

        /* 创建表 */
        $this->createTable('{{%customer_activities}}', [
            'id' => "int(11) NOT NULL AUTO_INCREMENT COMMENT '主键'",
            'name' => "varchar(255) NULL COMMENT '活动名称'",
            'money' => "decimal(10,2) NULL DEFAULT '0.00' COMMENT '活动金额'",
            'activity_script' => "varchar(255) NULL DEFAULT '' COMMENT '活动话术'",
            'detail' => "varchar(255) NULL DEFAULT '' COMMENT '活动产品介绍'",
            'status' => "int(3) NULL DEFAULT '1' COMMENT '活动状态[-1:删除;0:禁用;1启用]'",
            'created_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '修改时间'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='客户活动表'");

        /* 索引设置 */


        /* 表数据 */

        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%customer_activities}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}