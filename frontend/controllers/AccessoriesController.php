<?php

namespace frontend\controllers;

use Yii;
use backend\models\Accessories;
use yii\filters\AccessControl;

/**
 * AccessoriesController implements the CRUD actions for Accessories model.
 */
class AccessoriesController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['get-info', 'get-accessories'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionGetInfo() {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $id = $post['id'];
            $model = new Accessories();
            $accessories = $model->findOne(['id' => $id, 'deleted' => 0]); 
            $data = [
                'id' => $accessories->id,
                'name' => $accessories->name,
                'charge' => $accessories->charge,
                'price' => $accessories->price,
            ];
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'result' => $data,
                'code' => 100,
            ];
          }
    }

    public function actionGetAccessories($q = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return \common\services\AccessoriesService::filterByName($q);
    }
}
