<?php

use yii\db\Migration;

/**
 * Handles adding deleted to table `tasks`.
 */
class m180421_043111_add_deleted_column_to_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('tasks', 'deleted', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('tasks', 'deleted');
    }
}
