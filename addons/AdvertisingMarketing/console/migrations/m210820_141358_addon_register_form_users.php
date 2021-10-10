<?php

use yii\db\Migration;

/**
 * Class m210820_141358_register_form_users
 */
class m210820_141358_addon_register_form_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');

        /* 创建表 */
        $this->createTable('{{%addon_register_form_users}}', [
            'id' => "int(11) NOT NULL AUTO_INCREMENT",
            'merchant_id' => "int(10) unsigned NULL DEFAULT '0' COMMENT '商户id'",
            'register_form_id' => "int(10) unsigned NULL DEFAULT '0' COMMENT '注册单id'",
            'name' => "varchar(10) NOT NULL DEFAULT '' COMMENT '您的姓名'",
            'mobile' => "varchar(20) NOT NULL DEFAULT '' COMMENT '您的号码'",
            'province_id' => "int(10) NOT NULL DEFAULT '0' COMMENT '省'",
            'city_id' => "int(10) NOT NULL DEFAULT '0' COMMENT '市'",
            'area_id' => "int(10) NOT NULL DEFAULT '0' COMMENT '区'",
            'address' => "varchar(100) NOT NULL DEFAULT '' COMMENT '地址'",
            'source' => "varchar(16) NULL DEFAULT '' COMMENT '来源'",
//             'is_agree_agreement' => "tinyint(1) unsigned NULL DEFAULT '1' COMMENT '是否同意协议[0:不同意;1:同意]'",
            'created_at' => "int(10) NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '修改时间'",
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='注册单_用户'");

        /* 索引设置 */
        $this->createIndex('merchant_id','{{%addon_register_form_users}}','merchant_id',0);
        /* 表数据 */

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
        $this->dropTable('{{%addon_register_form_users}}');
        $this->execute('SET foreign_key_checks = 1;');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210820_141358_register_form_users cannot be reverted.\n";

        return false;
    }
    */
}
