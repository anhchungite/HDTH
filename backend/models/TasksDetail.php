<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tasks_detail".
 *
 * @property int $id
 * @property int $task_id
 * @property int $accessories_id
 * @property string $accessories_price
 * @property string $accessories_charge
 * @property int $accessories_qty
 * @property int $deleted
 *
 * @property Accessories $accessories
 * @property Tasks $task
 */
class TasksDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'accessories_id', 'accessories_qty'], 'integer'],
            [['accessories_price', 'accessories_charge'], 'number'],
            [['accessories_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accessories::className(), 'targetAttribute' => ['accessories_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => Yii::t('app', 'Task ID'),
            'accessories_id' => Yii::t('app', 'Accessories ID'),
            'accessories_price' => Yii::t('app', 'Accessories Price'),
            'accessories_charge' => Yii::t('app', 'Accessories Charge'),
            'accessories_qty' => Yii::t('app', 'Accessories Quantity'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessories()
    {
        return $this->hasOne(Accessories::className(), ['id' => 'accessories_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'task_id']);
    }
}
