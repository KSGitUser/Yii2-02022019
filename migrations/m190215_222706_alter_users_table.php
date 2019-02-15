<?php

use yii\db\Migration;

/**
 * Class m190215_222706_alter_users_table
 */
class m190215_222706_alter_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('users',
        'created_at', $this->integer());
        $this->addColumn('users',
        'updated_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
       $this->dropColumn('users', 
       'created_at');
       $this->dropColumn('users', 
       'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190215_222706_alter_users_table cannot be reverted.\n";

        return false;
    }
    */
}
