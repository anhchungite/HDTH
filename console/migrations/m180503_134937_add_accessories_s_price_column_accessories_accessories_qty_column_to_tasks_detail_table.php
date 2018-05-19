<?php

use yii\db\Migration;

/**
 * Handles adding accessories_s_price_column_accessories_accessories_qty to table `tasks_detail`.
 */
class m180503_134937_add_accessories_s_price_column_accessories_accessories_qty_column_to_tasks_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('tasks_detail', 'accessories_s_price', $this->decimal(19,0)->after('accessories_id'));
        $this->addColumn('tasks_detail', 'accessories_qty', $this->integer()->after('accessories_charge'));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('tasks_detail', 'accessories_s_price');
        $this->dropColumn('tasks_detail', 'accessories_qty');
    }
}
