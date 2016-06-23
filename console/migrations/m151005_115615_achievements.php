<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_115615_achievements extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%achievements}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'nomber1' => Schema::TYPE_INTEGER,
            'title1' => Schema::TYPE_STRING,
            'nomber2' => Schema::TYPE_INTEGER,
            'title2' => Schema::TYPE_STRING,
            'nomber3' => Schema::TYPE_INTEGER,
            'title3' => Schema::TYPE_STRING,
            'nomber4' => Schema::TYPE_INTEGER,
            'title4' => Schema::TYPE_STRING,
            'image1' => Schema::TYPE_STRING,
            'name1' => Schema::TYPE_STRING,
            'description1' => Schema::TYPE_TEXT,
            'image2' => Schema::TYPE_STRING,
            'name2' => Schema::TYPE_STRING,
            'description2' => Schema::TYPE_TEXT,
            'image3' => Schema::TYPE_STRING,
            'name3' => Schema::TYPE_STRING,
            'description3' => Schema::TYPE_TEXT,
            'status' => Schema::TYPE_STRING,

        ], $tableOptions);

        $this->createTable('{{%social_network}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'image' => Schema::TYPE_STRING,
            'link' => Schema::TYPE_STRING,
            'status' => Schema::TYPE_STRING,
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%achievements}}');
        $this->dropTable('{{%social_network}}');
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
