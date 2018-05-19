<?php

use yii\db\Migration;

/**
 * Class m180503_135348_refactor_price_column
 */
class m180503_135348_refactor_price_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->renameColumn('accessories', 'price', 'o_price');
        $this->renameColumn('accessories', 's_price', 'price');
        $this->renameColumn('tasks_detail', 'accessories_s_price', 'accessories_price');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m180503_135348_refactor_price_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180503_135348_refactor_price_column cannot be reverted.\n";

        return false;
    }
    */
}
