<?php

use yii\db\Migration;

/**
 * Class m180505_075438_alter_column_user_table
 */
class m180505_075438_alter_column_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->alterColumn('user', 'role', $this->string(20)->defaultValue('Employee'));
        $this->dropColumn('user', 'deleted');
        $this->addColumn('user', 'status', $this->boolean()->defaultValue(0)->after('role'));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m180505_075438_alter_column_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180505_075438_alter_column_user_table cannot be reverted.\n";

        return false;
    }
    */
}
