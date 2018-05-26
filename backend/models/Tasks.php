<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $customer
 * @property string $note
 * @property string $name
 * @property string $charge
 * @property int $status
 * @property int $paid
 * @property string $create_at
 * @property string $update_at
 * @property int $deleted
 *
 * @property TasksDetail[] $tasksDetails
 */
class Tasks extends \yii\db\ActiveRecord
{
    public function beforeSave($insert)
    {
        $this->customer = strtoupper($this->customer);
        return parent::beforeSave($insert);
    }
    public static function find()
    {
        return new TasksQuery(get_called_class());
    }

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
            [['note'], 'string'],
            [['charge'], 'number'],
            [['charge'], 'required'],
            [['status', 'paid', 'deleted'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['customer', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'customer' => Yii::t('app', 'Customer'),
            'note' => Yii::t('app', 'Note'),
            'charge' => Yii::t('app', 'Charge'),
            'paid' => Yii::t('app', 'Paid'),
            'status' => Yii::t('app', 'Status'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
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
