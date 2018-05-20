<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8 col-sm-offset-1 col-md-offset-2 col-lg-offset-2">
    <?php Pjax::begin(); ?>
      <?= Html::beginForm(['site/'], 'post', ['data-pjax' => '']); ?>
      <div class="input-group">
        <?= Html::input('text', 'customer', Yii::$app->request->post('customer'), ['class' => 'form-control input-lg', 'placeholder' => 'Search']) ?>
        <div class="input-group-btn">
          <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i> Search', ['class' => 'btn btn-lg btn-default']) ?>
        </div>
      </div>
      <?= Html::endForm() ?>
      <?php
      if(!empty($tasks)):
      ?>
      <div class="panel panel-default mr-top-15">
        <div class="panel-heading text-left">
          <?= Yii::$app->user->isGuest ? Yii::t('app', 'Result of: ') . $customer : Html::a(Yii::t('app', 'Create task for: ') . $customer, ['task/create', 'for' => $customer], ['class' => 'btn btn-default'])?>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <?php if(Yii::$app->user->isGuest){?>
                <thead>
                  <tr>
                    <th><?=Yii::t('app', 'Customer')?></th>
                    <th><?=Yii::t('app', 'Create At')?></th>
                    <th><?=Yii::t('app', 'Status')?></th>
                  </tr>
                </thead>
                <tbody class='text-left'>
                  <tr>
                    <td><?= $tasks->customer_id ?></td>                
                    <td><?= $tasks->create_at?></td>                
                    <td><?= Yii::t('app', Yii::$app->params['task.status'][$tasks->status])?></td>               
                  </tr>
                </tbody>
              <?php } else {?>
                <thead>
                  <tr>
                    <th><?=Yii::t('app', 'Serial')?></th>
                    <th><?=Yii::t('app', 'Customer')?></th>
                    <th><?=Yii::t('app', 'Create At')?></th>
                    <th><?=Yii::t('app', 'Status')?></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class='text-left'>
                <?php
                  foreach($tasks as $k => $task):
                ?>
                  <tr>
                    <td><?= $k + 1?></td>
                    <td><?= $task->customer_id ?></td>                
                    <td><?= $task->create_at?></td>                
                    <td><?= Yii::$app->params['task.status'][$task->status]?></td>                
                    <td><?= Html::a(Yii::t('app', 'Detail'), ['task/view', 'id' => $task->id])?></td>                
                  </tr>
                <?php endforeach?>
                </tbody>
              <?php }?>
            </table>
          </div>
      <?php
      endif;
      ?>
    <?php Pjax::end(); ?>
    </div>
  </div>
  </form>
    </div>
    
    </div>

    <div class="body-content">

    </div>
</div>
