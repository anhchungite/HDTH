<?php

namespace common\helpers;

use Yii;
use yii\helpers\Html;


class CommonHelper {
    public static function transArray($array, $cat = 'app') {         
        foreach ($array as $key => &$value) {
            $value = Yii::t($cat, $value);
        }   
        return $array;   
    }
}