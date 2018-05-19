<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Accessories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accessories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'o_price',
                'value' => number_format($model->o_price)
            ],
            [
                'attribute' => 'price',
                'value' => number_format($model->price)
            ],
            [
                'attribute' => 'charge',
                'value' => number_format($model->charge)
            ]
        ],
    ]) ?>

</div>
