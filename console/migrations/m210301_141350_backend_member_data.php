<?php

use yii\db\Migration;

/**
 * Class m210301_141350_backend_member_data
 */
class m210301_141350_backend_member_data extends Migration
{
    public function up()
    {
       // 一、ID 、是否出勤、客服ID、呼叫总数、应答数、成功数 、成功率、平均通话时长、通话总时长、日期。
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');

        /* 创建表 */
        $this->createTable('{{%backend_member_data}}', [
            'id' => "int(11) NOT NULL AUTO_INCREMENT COMMENT '主键'",
            'is_work' => "tinyint(1) unsigned NULL COMMENT '是否出勤'",
            'bm_id' => "int(5) NULL DEFAULT '0' COMMENT '客服ID'",
            'call_totals' => "int(5) NULL DEFAULT '0' COMMENT '呼叫总数'",
            'answer_number' => "int(5) NULL DEFAULT '0' COMMENT '应答数'",
            'success_number' => "int(5) NULL DEFAULT '0' COMMENT '成功数'",
            'success_rate' => "decimal(10,4) NULL COMMENT '成功率'",
            'average_duration' => "decimal(10,4) NULL DEFAULT '0' COMMENT '平均通话时长'",
            'total_duration' => "decimal(10,4) NULL DEFAULT '0' COMMENT '通话总时长'",
            'created_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '创建时间'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='坐席指标数据表'");

        /* 索引设置 */
        $this->createIndex('bm_id','{{%backend_member_data}}','bm_id',0);
        /* 表数据 */

        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%backend_member_data}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
