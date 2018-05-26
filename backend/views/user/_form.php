<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username')->textInput(['disabled' => 'disabled']) ?>
            <?= $form->field($model, 'name')->textInput() ?>
                <?= $form->field($model, 'email')->textInput() ?>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <?= $form->field($model, 'role')->dropDownList($roles) ?>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <?= $form->field($model, 'status')->dropDownList($status) ?>
                        </div>
                    </div>
                    <p>
                    <?= Html::a('<span class="glyphicon glyphicon-lock"></span> ' . Yii::t('app', 'Change password.'), ['user/change-password', 'id' => $model->id])?>
                        
                    </p>
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

    </div>