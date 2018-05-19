<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accessories".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $s_price
 * @property string $charge
 * @property int $deleted
 *
 * @property TasksAccessories[] $tasksAccessories
 */
class Accessories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accessories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['o_price', 'price', 'charge'], 'number'],
            [['deleted'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app', 'Name'),
            'o_price' => Yii::t('app', 'Original Price'),
            'price' => Yii::t('app', 'Sale Price'),
            'charge' => Yii::t('app', 'Charge'),
            'deleted' => 'Deleted',
        ];
    }

    // public static function findOne($condition)
    // {
    //     return static::findByCondition($condition)->one()->where(['deleted' => 0]);
    // }
}
