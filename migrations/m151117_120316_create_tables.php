<?php

use yii\db\Schema;
use yii\db\Migration;

class m151117_120316_create_tables extends Migration
{
    public function up()
    {
        $this->createTable('blog_categories', [
            'id' => Schema::TYPE_PK,
            'parent_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'user_id' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('blog_records', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER,
            'author_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'intro' => Schema::TYPE_TEXT,
            'article' => Schema::TYPE_TEXT,
            'date' => Schema::TYPE_DATETIME,
        ]);

        $this->createTable('blog_tags', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
        ]);

        $this->createTable('blog_tags_relations', [
            'id' => Schema::TYPE_PK,
            'tag_id' => Schema::TYPE_INTEGER,
            'record_id' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('images', [
            'id' => Schema::TYPE_PK,
            'type' => Schema::TYPE_SMALLINT,
            'record_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'file_name' => Schema::TYPE_STRING,
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
        $this->dropTable('blog_categories');
        $this->dropTable('blog_records');
        $this->dropTable('blog_tags');
        $this->dropTable('blog_tags_relations');
        $this->dropTable('images');
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
