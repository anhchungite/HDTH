<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tasks */

$this->title = $modelTasks->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1>#<?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $modelTasks->id], ['class' => 'btn btn-primary']) ?>
        <?= \common\components\Auth::isAdmin() ? Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $modelTasks->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) : '' ?>
    </p>

    <?= DetailView::widget([
        'model' => $modelTasks,
        'attributes' => [
            'id',
            'customer_id',
            'content:ntext',
            [
                'attribute' => 'charge',
                'value' => number_format($modelTasks->charge)
            ],
            [
                'attribute' => 'status',
                'value' => Yii::t('app', Yii::$app->params['task.status'][$modelTasks->status])
            ],
            'create_at',
            'update_at'
        ],
    ]) ?>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><?= Yii::t('app', 'Serial')?></th>
                        <th><?= Yii::t('app', 'Name')?></th>
                        <th><?= Yii::t('app', 'Unit price')?></th>
                        <th><?= Yii::t('app', 'Replacement fee')?></th>
                        <th><?= Yii::t('app', 'Quantity')?></th>
                        <th><?= Yii::t('app', 'Into money')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach($modelTasksDetail as $key => $taskDetail):
                        $accessoriesPrice = $taskDetail->accessories_price;
                        $accessoriesCharge = $taskDetail->accessories_charge;
                        $accessoriesQty = $taskDetail->accessories_qty;
                        $accessoriesTotal = $accessoriesPrice * $accessoriesQty + $accessoriesCharge;
                        $total += $accessoriesTotal;
                    ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $taskDetail->accessories->name?></td>
                        <td><?= number_format($accessoriesPrice)?></td>
                        <td><?= number_format($accessoriesCharge)?></td>
                        <td><?= $accessoriesQty?></td>
                        <td><?= number_format($accessoriesTotal)?></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
                <tfoot>
                    <tr>
                    <td colspan=6><h4 class="pull-right"><?= Yii::t('app', 'Sub total:')?> <?= number_format($total)?></h4></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="padding-v-md">
            <div class="line line-dashed"></div>
        </div>
        <h3 class="pull-right"><?= Yii::t('app', 'Total:')?> <?= number_format($modelTasks->charge + $total)?></h3>
</div>
