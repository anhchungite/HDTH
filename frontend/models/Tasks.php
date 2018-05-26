<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $customer
 * @property string $content
 * @property string $charge
 * @property int $status
 * @property string $create_at
 * @property string $update_at
 * @property int $deleted
 *
 * @property TasksDetail[] $tasksDetails
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['charge'], 'number'],
            [['status', 'deleted'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['customer'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer' => 'Customer',
            'content' => 'Content',
            'charge' => 'Charge',
            'status' => 'Status',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasksDetails()
    {
        return $this->hasMany(TasksDetail::className(), ['task_id' => 'id']);
    }
}
