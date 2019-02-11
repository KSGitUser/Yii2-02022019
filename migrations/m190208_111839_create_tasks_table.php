<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 */
class m190208_111839_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'responsible_id' => $this->integer(),
            'date' => $this->date()->notNull(),
            'status_id' => $this->integer(),
        ]);

       /*  $this->createIndex("ix_tasks_responsible", "tasks", "responsible_id"); */
        $this->addForeignKey("fk_users_foreign", "tasks", "responsible_id", "users", "id" );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tasks}}');
    }
}
