<?php

use yii\db\Migration;

/**
 * Class m210820_141748_common_service_agreements
 */
class m210820_141748_addon_common_service_agreements extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');

        /* 创建表 */
        $this->createTable('{{%addon_common_service_agreements}}', [
            'uuid' => "char(32) NOT NULL COMMENT '主键'",
            'cate' => "varchar(30) NOT NULL DEFAULT '' COMMENT '协议类别'",
            'detail_cate' => "varchar(30) NOT NULL DEFAULT '' COMMENT '协议所属'",
            'agreement' => "text NOT NULL COMMENT '协议内容'",
            'status' => "tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态[-1:删除;0:禁用;1启用]'",
            'created_at' => "int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => "int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间'",
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='服务协议表'");

        /* 索引设置 */

        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%addon_common_service_agreements}}');
        $this->execute('SET foreign_key_checks = 1;');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210820_141748_common_service_agreements cannot be reverted.\n";

        return false;
    }
    */
}
