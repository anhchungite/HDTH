<?php

use yii\db\Migration;

/**
 * Handles adding name_column_deleted_column_role to table `user`.
 */
class m180421_045320_add_name_column_deleted_column_role_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('user', 'deleted', $this->boolean()->defaultValue(0));
        $this->addColumn('user', 'name', $this->string(50)->after('id'));
        $this->addColumn('user', 'role', $this->integer(1)->defaultValue(1)->after('email'));
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('user', 'deleted');
        $this->dropColumn('user', 'name');
        $this->dropColumn('user', 'role');
    }
}
