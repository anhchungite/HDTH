<?php

namespace common\components;
use Yii;

class Auth {

    public static function isAdmin() {
        if(Yii::$app->user->identity) {
            $role = Yii::$app->user->identity->role;
            return $role == 'Admin';
        }
    }
}