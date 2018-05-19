<?php

namespace backend\controllers;

use Yii;
use yii\web\Cookie;

/**
 * AccessoriesController implements the CRUD actions for Accessories model.
 */
class LanguageController extends \yii\web\Controller {

    public function actionSet($language = 'en-US') {
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name' => 'language',
            'value' => $language
            ]));
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}