<?php

use yii\db\Migration;

/**
 * Handles adding deleted to table `tasks_accessories`.
 */
class m180421_043143_add_deleted_column_to_tasks_accessories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('tasks_accessories', 'deleted', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('tasks_accessories', 'deleted');
    }
}
