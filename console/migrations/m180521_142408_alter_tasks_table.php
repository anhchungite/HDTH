<?php

use yii\db\Migration;

/**
 * Class m180521_142408_alter_tasks_table
 */
class m180521_142408_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->renameColumn('tasks', 'customer', 'customer');
        $this->addColumn('tasks', 'name', $this->string(255)->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m180521_142408_alter_tasks_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180521_142408_alter_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}
