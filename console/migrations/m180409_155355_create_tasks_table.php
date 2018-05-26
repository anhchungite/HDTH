<?php

use yii\db\Migration;

class m180409_155355_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'customer' => $this->string(),
            'content' => $this->text(),
            'charge' => $this->money(),
            'status' => $this->boolean()->defaultValue(0),
            'create_at' => $this->dateTime(),
            'update_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('tasks');
    }
}
