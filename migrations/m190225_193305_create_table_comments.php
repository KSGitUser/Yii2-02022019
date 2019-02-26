<?php

use yii\db\Migration;

/**
 * Class m190225_193305_create_table_comments
 */
class m190225_193305_create_table_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'comment' => $this->text(),
            'task_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);

        $this->addForeignKey("fk_comments_task", "comments", "task_id", "tasks", "id" );
        $this->addForeignKey("fk_comments_user", "comments", "user_id", "users", "id" );
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('comments');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_193305_create_table_comments cannot be reverted.\n";

        return false;
    }
    */
}
