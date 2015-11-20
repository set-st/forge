<?php

use yii\db\Schema;
use yii\db\Migration;

class m151117_120316_create_tables extends Migration
{
    public function up()
    {
        $this->createTable('clients', [
            'id' => Schema::TYPE_PK,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'hash' => Schema::TYPE_TEXT,
        ]);

        /*
        $this->insert('clients', [
            'title' => 'test 1',
            'content' => 'content 1',
        ]);
        */
    }

    public function down()
    {
        $this->dropTable('clients');
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
