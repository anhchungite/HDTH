<?php

use yii\db\Migration;

/**
 * Handles adding deleted to table `accessories`.
 */
class m180421_042850_add_deleted_column_to_accessories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('accessories', 'deleted', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('accessories', 'deleted');
    }
}
