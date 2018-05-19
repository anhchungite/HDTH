<?php

use yii\db\Migration;

/**
 * Class m180512_170008_remove_deleted_column_table_tasks_detail
 */
class m180512_170008_remove_deleted_column_table_tasks_detail extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->dropColumn('tasks_detail', 'deleted');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m180512_170008_remove_deleted_column_table_tasks_detail cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180512_170008_remove_deleted_column_table_tasks_detail cannot be reverted.\n";

        return false;
    }
    */
}
