<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
class BaseController extends Controller {


    
    public function init()
    {
        parent::init();
        $cookies = Yii::$app->request->cookies;
        if($cookies->has('language') && $this->checkValidLanguage($cookies->get('language'))) {
            Yii::$app->language = $cookies->get('language')->value;
        }
        if(\common\components\Auth::isAdmin() === false) {
            return $this->redirect('/');
        }
    }

    protected function checkValidLanguage($language) {
        foreach (Yii::$app->params['languages'] as $k => $v) {
            if($language == $k) return true;
        }
        return false;
    }
}