<?php

use yii\db\Schema;
use yii\db\Migration;

class m151004_231355_about extends Migration
{
      public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%about}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'position' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
            'image' => Schema::TYPE_STRING,
            'status' => Schema::TYPE_STRING,
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%about}}');
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
