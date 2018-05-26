<?php
namespace backend\models;
use yii\db\ActiveQuery;

class AccessoriesQuery extends ActiveQuery
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    // conditions appended by default (can be skipped)
    public function init()
    {
        $this->andOnCondition(['deleted' => static::STATUS_DELETED]);
        parent::init();
    }

}