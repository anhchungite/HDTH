<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $customer_id
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
            [['content', 'charge'], 'required'],
            [['status', 'deleted'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['customer_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => Yii::t('app', 'Customer'),
            'content' => Yii::t('app', 'Note'),
            'charge' => Yii::t('app', 'Charge'),
            'status' => Yii::t('app', 'Status'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
            'deleted' => Yii::t('app', 'Deleted'),
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
