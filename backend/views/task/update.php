<?php
// echo '<pre>';
// var_dump($modelTasksDetail);die;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tasks */

$this->title = Yii::t('app', 'Update Tasks: ') . $modelTasks->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelTasks->id, 'url' => ['view', 'id' => $modelTasks->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tasks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelTasks' => $modelTasks,
        'modelTasksDetail' => $modelTasksDetail
    ]) ?>

</div>
