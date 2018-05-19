<?php
namespace backend\controllers;

use Yii;

/**
 * Site controller
 */
class StatisticController extends BaseController
{
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}
