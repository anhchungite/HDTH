<?php
namespace common\models;
use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    // conditions appended by default (can be skipped)
    public function init()
    {
        $this->andOnCondition(['deleted' => static::STATUS_DELETED]);
        parent::init();
    }

    // ... add customized query methods here ...

    public function active($state = self::STATUS_ACTIVE)
    {
        return $this->andOnCondition(['active' => $state]);
    }
}