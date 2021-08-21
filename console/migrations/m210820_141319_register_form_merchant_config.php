<?php

use yii\db\Migration;

/**
 * Class m210820_141319_register_form_merchant_config
 */
class m210820_141319_register_form_merchant_config extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');

        /* 创建表 */
        $this->createTable('{{%register_form_merchant_config}}', [
            'uuid' => "char(32) NOT NULL ",
            'merchant_id' => "int(10) unsigned NULL DEFAULT '0' COMMENT '商户id'",
            'merchant_name'=> "varchar(20) NULL DEFAULT '' COMMENT '商户展示名称'",
            'title' => "varchar(20) NULL DEFAULT '' COMMENT '标题'",
            'header_img' => "varchar(100) NULL DEFAULT '' COMMENT '头部图片'",//可以一张或者多张
            'header_img_show_mode' => "tinyint(1) unsigned NULL DEFAULT '1' COMMENT '头部图片展示方式[1:排列展示;2:轮播展示]'",
            'header_dynamic' => "tinyint(1) unsigned NULL DEFAULT '3' COMMENT '头部动态[0:不展示；1:只展示动态;2:只展示人数;3:全部展示]'",
//           'default_agreement'=> "tinyint(1) unsigned NULL DEFAULT '1' COMMENT '头部动态[0:不使用；1:使用]'",
            'agreement' => "text NOT NULL COMMENT '商家协议内容'",//如果为空使用默认协议
            'footer_img' => "varchar(100) NULL DEFAULT '' COMMENT '尾部图片'",//可以0张或者多张
            'support_phone' => "varchar(20) NULL DEFAULT '' COMMENT '咨询电话'",//为空就不支持
            'register_number' => "int(11) NOT NULL DEFAULT '0' COMMENT '注册数量'",
            'click_number'  => "int(10) NULL DEFAULT '0' COMMENT '点击数'",
            'status' => "tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态(-1:已删除,0:禁用,1:正常)'",
            'created_at' => "int(10) NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => "int(10) unsigned NULL DEFAULT '0' COMMENT '修改时间'",
            'PRIMARY KEY (`uuid`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='注册单_商户配置'");

        /* 索引设置 */
        $this->createIndex('merchant_id','{{%register_form_merchant_config}}','merchant_id',0);


        /* 表数据 */

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
        $this->dropTable('{{%register_form_merchant_config}}');
        $this->execute('SET foreign_key_checks = 1;');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210820_141319_register_form_merchant_config cannot be reverted.\n";

        return false;
    }
    */
}
