<?php

namespace backend\controllers;

use Yii;
use backend\models\Tasks;
use backend\models\SearchTasks;
use backend\models\TasksDetail;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Model;
use yii\helpers\ArrayHelper;

/**
 * TaskController implements the CRUD actions for Tasks model.
 */
class TaskController extends BaseController
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
                        'actions' => ['index', 'create', 'update', 'deleted', 'view', 'get-customer'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchTasks();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $modelTasks = $this->findModel($id);
        $modelTasksDetail = $modelTasks->tasksDetails;
        return $this->render('view', [
            'modelTasks' => $modelTasks,
            'modelTasksDetail' => $modelTasksDetail
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelTasks = new Tasks();
        $modelTasksDetail = [new TasksDetail()];
        if ($modelTasks->load(Yii::$app->request->post())) {
            $modelTasksDetail = Model::createMultiple(TasksDetail::className());
            Model::loadMultiple($modelTasksDetail, Yii::$app->request->post());

            // validate all models
            $valid = $modelTasks->validate();
            $valid = Model::validateMultiple($modelTasksDetail) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    $modelTasks->create_at = date('Y-m-d H:i:s');
                    $modelTasks->update_at = date('Y-m-d H:i:s');
                    if ($flag = $modelTasks->save(false)) {
                        foreach ($modelTasksDetail as $modelTaskDetail) {
                            $modelTaskDetail->task_id = $modelTasks->id;
                            if (! ($flag = $modelTaskDetail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelTasks->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelTasks' => $modelTasks,
            'modelTasksDetail' => (empty($modelTasksDetail)) ? [new TasksDetail()] : $modelTasksDetail
        ]);
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $modelTasks = $this->findModel($id);
        $modelTasksDetail = $modelTasks->tasksDetails;

        if ($modelTasks->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelTasksDetail, 'id', 'id');
            $modelTasksDetail = Model::createMultiple(TasksDetail::classname(), $modelTasksDetail);
            Model::loadMultiple($modelTasksDetail, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelTasksDetail, 'id', 'id')));

            // validate all models
            $valid = $modelTasks->validate();
            $valid = Model::validateMultiple($modelTasksDetail) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    $modelTasks->update_at = date('Y-m-d H:i:s');
                    if ($flag = $modelTasks->save(false)) {
                        if (!empty($deletedIDs)) {
                            TasksDetail::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelTasksDetail as $modelTaskDetail) {
                            $modelTaskDetail->task_id = $modelTasks->id;
                            if (! ($flag = $modelTaskDetail->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelTasks->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelTasks' => $modelTasks,
            'modelTasksDetail' => (empty($modelTasksDetail)) ? [new TasksDetail()] : $modelTasksDetail
        ]);
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->deleted = 1;
        if($model->save()) {
            return $this->redirect(['index']);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetCustomer($q = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return \common\services\CustomerService::filterByName($q);
    }
}
