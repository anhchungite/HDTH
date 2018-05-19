<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchAccessories */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Accessories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Accessories'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'o_price',
                'content' => function ($model) {
                    return number_format($model->o_price);
                }
            ],
            [
                'attribute' => 'price',
                'content' => function ($model) {
                    return number_format($model->price);
                }
            ],
            [
                'attribute' => 'charge',
                'content' => function ($model) {
                    return number_format($model->charge);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
