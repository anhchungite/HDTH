<?php
use backend\models\Tasks;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
            
            <div class="panel panel-warning">
                  <div class="panel-heading">
                        <h3 class="panel-title"><?= Yii::t('app', 'Pending tasks')?></h3>
                  </div>
                  <div class="panel-body">
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><?= Yii::t('app', 'Serial')?></th>
                                    <th><?= Yii::t('app', 'Customer')?></th>
                                    <th><?= Yii::t('app', 'Create At')?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $tasks = Tasks::findAll(['status' => 0]);
                            foreach($tasks as $k => $task):
                            ?>
                                <tr>
                                    <td><?= $k + 1?></td>
                                    <td><?= $task->customer?></td>
                                    <td><?= $task->create_at?></td>
                                    <td><?= Html::a(Yii::t('app', 'Detail'), ['task/view', 'id' => $task->id])?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            </div>
            <div class="col-lg-6">
                
                <div class="panel panel-success">
                      <div class="panel-heading">
                            <h3 class="panel-title"><?= Yii::t('app', 'Recent completed tasks')?></h3>
                      </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><?= Yii::t('app', 'Serial')?></th>
                                        <th><?= Yii::t('app', 'Customer')?></th>
                                        <th><?= Yii::t('app', 'Create At')?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $tasks = Tasks::findAll(['status' => 1]);
                                foreach($tasks as $k => $task):
                                ?>
                                    <tr>
                                        <td><?= $k + 1?></td>
                                        <td><?= $task->customer?></td>
                                        <td><?= $task->create_at?></td>
                                        <td><?= Html::a(Yii::t('app', 'Detail'), ['task/view', 'id' => $task->id])?></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                      </div>
                </div>
                
            </div>
        </div>

    </div>
</div>