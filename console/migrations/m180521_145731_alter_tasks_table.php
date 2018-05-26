<?php

use yii\db\Migration;

/**
 * Class m180521_145731_alter_tasks_table
 */
class m180521_145731_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('tasks', 'content', 'note');
        $this->addColumn('tasks', 'paid', $this->boolean()->defaultValue(0)->after('charge'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('tasks', 'note', 'content');
        $this->dropColumn('tasks', 'paid');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180521_145731_alter_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}
