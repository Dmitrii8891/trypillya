<?php

use yii\db\Schema;
use yii\db\Migration;

class m151012_124744_coordinates extends Migration
{
     public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%coordinates}}', [
            'id' => Schema::TYPE_PK,
            'image' => Schema::TYPE_STRING,
            'tile' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
            'x' => Schema::TYPE_INTEGER,
            'y' => Schema::TYPE_INTEGER,
            'category_map' => Schema::TYPE_INTEGER,
            'category_we' => Schema::TYPE_INTEGER,
            'portfolio_id' => Schema::TYPE_INTEGER,

        ], $tableOptions);
        
//        $this->addForeignKey('fk-category-parent_id-category-id', '{{%category}}', 'parent_id', '{{%category}}', 'id', 'CASCADE');
//        
//        
//        
//        $this->createTable('{{%category}}', [
//            'id' => Schema::TYPE_PK,
//            'parent_id' => Schema::TYPE_INTEGER,
//            'title' => Schema::TYPE_STRING,
//            'slug' => Schema::TYPE_STRING,
//        ], $tableOptions);
//
//        $this->addForeignKey('fk-category-parent_id-category-id', '{{%category}}', 'parent_id', '{{%category}}', 'id', 'CASCADE');
//
//        $this->createTable('{{%pages}}', [
//            'id' => Schema::TYPE_PK,
//            'title' => Schema::TYPE_STRING,
//            'slug' => Schema::TYPE_STRING,
//            'description' => Schema::TYPE_TEXT,
//            'category_id' => Schema::TYPE_INTEGER,
//            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
//        ], $tableOptions);
//
//        $this->addForeignKey('fk-pages-category_id-category_id', '{{%pages}}', 'category_id', '{{%category}}', 'id', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%coordinates}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
