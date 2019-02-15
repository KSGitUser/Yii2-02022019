<?php

use yii\db\Migration;

/**
 * Class m190215_224054_alter_tasks_table
 */
class m190215_224054_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('tasks',
        'created_at', $this->integer());
        $this->addColumn('tasks',
        'updated_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
       $this->dropColumn('tasks', 
       'created_at');
       $this->dropColumn('tasks', 
       'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190215_224054_alter_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}
