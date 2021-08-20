<?php

use yii\db\Migration;

/**
 * Class m210820_141231_register_form_sys_config
 */
class m210820_141231_register_form_sys_config extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');

        /* 创建表 */
        $this->createTable('{{%register_form_sys_config}}', [
            'id' => "int(10) unsigned NOT NULL COMMENT '主键'",
            'merchant_id' => "int(10) unsigned NULL DEFAULT '0' COMMENT '商户id'",
            //肯定都不想展示'platform_agreement' => "tinyint(1) unsigned NULL DEFAULT '1' COMMENT '平台协议展示[0:不展示;1:展示]'",
            //肯定都不想展示'platform_support' => "tinyint(1) unsigned NULL DEFAULT '1' COMMENT '平台支持展示[0:不展示;1:展示]'",

            'status' => "tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态[-1:删除;0:禁用;1启用]'",
            'created_at' => "int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => "int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='公用_配置表'");

        /* 索引设置 */
        $this->createIndex('merchant_id','{{%register_form_sys_config}}','merchant_id',0);

        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%register_form_sys_config}}');
        $this->execute('SET foreign_key_checks = 1;');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210820_141231_register_form_sys_config cannot be reverted.\n";

        return false;
    }
    */
}
