<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_063538_portfolio extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%portfolio}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'image1' => Schema::TYPE_STRING,
            'object' => Schema::TYPE_STRING,
            'location' => Schema::TYPE_STRING,
            'area' => Schema::TYPE_INTEGER,
            'client' => Schema::TYPE_STRING,
            'task' => Schema::TYPE_STRING,
            'city' => Schema::TYPE_STRING,
            'project_manadger' => Schema::TYPE_STRING,
            'team' => Schema::TYPE_TEXT,
            'text1' => Schema::TYPE_TEXT,
            'video' => Schema::TYPE_TEXT,
            'text2' => Schema::TYPE_TEXT,
            'image2' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'map' => Schema::TYPE_TEXT,
            'user_id' => Schema::TYPE_INTEGER,
            'status' => Schema::TYPE_STRING,
            'rating' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->addForeignKey('fk-portfolio-user_id-user_id', '{{%portfolio}}', 'user_id', '{{%user}}', 'id', 'RESTRICT');

        $this->createTable('{{%image}}', [
            'id' => Schema::TYPE_PK,
            'portfolio_id' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->addForeignKey('fk-image-portfolio_id-portfolio_id', '{{%image}}', 'portfolio_id', 'portfolio', 'id', 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('{{%image}}');
        $this->dropTable('{{%portfolio}}');
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
