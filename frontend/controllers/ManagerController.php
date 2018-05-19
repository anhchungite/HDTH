<?php

namespace frontend\controllers;
use Yii;
use yii\filters\AccessControl;

class ManagerController extends BaseController {

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    // [
                    //     'actions' => ['login', 'error'],
                    //     'allow' => true,
                    // ],
                    [
                        'actions' => ['index', 'create-task', 'update-task'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        echo '<h1>Customer</h1>';
    }
}