<?php

use yii\db\Migration;

/**
 * Class m180503_132258_rename_table_tasks_accessories
 */
class m180503_132258_rename_table_tasks_accessories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->renameTable("tasks_accessories", "tasks_detail");
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->renameTable("tasks_detail", "tasks_accessories");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180503_132258_rename_table_tasks_accessories cannot be reverted.\n";

        return false;
    }
    */
}
