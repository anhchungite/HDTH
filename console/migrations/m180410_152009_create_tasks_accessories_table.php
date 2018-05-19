<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks_accessories`.
 * Has foreign keys to the tables:
 *
 * - `task`
 * - `accessories`
 */
class m180410_152009_create_tasks_accessories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('tasks_accessories', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'accessories_id' => $this->integer(),
            'accessories_charge' => $this->money(),
        ]);

        // creates index for column `task_id`
        $this->createIndex(
            'idx-tasks_accessories-task_id',
            'tasks_accessories',
            'task_id'
        );

        // add foreign key for table `task`
        $this->addForeignKey(
            'fk-tasks_accessories-task_id',
            'tasks_accessories',
            'task_id',
            'tasks',
            'id',
            'CASCADE'
        );

        // creates index for column `accessories_id`
        $this->createIndex(
            'idx-tasks_accessories-accessories_id',
            'tasks_accessories',
            'accessories_id'
        );

        // add foreign key for table `accessories`
        $this->addForeignKey(
            'fk-tasks_accessories-accessories_id',
            'tasks_accessories',
            'accessories_id',
            'accessories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        // drops foreign key for table `task`
        $this->dropForeignKey(
            'fk-tasks_accessories-task_id',
            'tasks_accessories'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            'idx-tasks_accessories-task_id',
            'tasks_accessories'
        );

        // drops foreign key for table `accessories`
        $this->dropForeignKey(
            'fk-tasks_accessories-accessories_id',
            'tasks_accessories'
        );

        // drops index for column `accessories_id`
        $this->dropIndex(
            'idx-tasks_accessories-accessories_id',
            'tasks_accessories'
        );

        $this->dropTable('tasks_accessories');
    }
}
