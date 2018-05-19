<?php

use yii\db\Migration;

/**
 * Handles the creation of table `accessories`.
 */
class m180409_153759_create_accessories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('accessories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->money(),
            's_price' => $this->money(),
            'charge' => $this->money(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('accessories');
    }
}
