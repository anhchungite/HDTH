<?php

use yii\db\Migration;

/**
 * Handles adding deleted to table `user`.
 */
class m180521_143856_add_deleted_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'deleted', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'deleted');
    }
}
