<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Accessories;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\helpers\CommonHelper;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;
use kartik\typeahead\Typeahead;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-dynamicform").each(function(index) {
        jQuery(this).html("'. Yii::t('app', 'Accessories') .': " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-dynamicform").each(function(index) {
        jQuery(this).html("'. Yii::t('app', 'Accessories') .': " + (index + 1))
    });
});
';
$this->registerJs($js);
$url = \yii\helpers\Url::to(['accessories/get-accessories']);
$jsOnload = '
var url_get_accessories_info = "'. \yii\helpers\Url::to(['accessories/get-info']) .'";
';
$this->registerJs($jsOnload, View::POS_HEAD);
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?= $form->field($modelTasks, 'name')->textInput(['maxlength' => true])?>            

            <?= $form->field($modelTasks, 'customer')->widget(Typeahead::classname(), [
                'options' => ['placeholder' => Yii::t('app', 'Filter as you type ...')],
                'pluginOptions' => ['highlight'=>true],
                'dataset' => [
                    [
                        'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('customer')",
                        'display' => 'customer',
                        'remote' => [
                            'url' => Url::to(['task/get-customer']) . '?q=%QUERY',
                            'wildcard' => '%QUERY'
                        ]
                    ]
                ]
            ]); ?>

            <?= $form->field($modelTasks, 'note')->textarea(['rows' => 6]) ?>

            <?= $form->field($modelTasks, 'charge')->textInput(['maxlength' => true, 'value' => $modelTasks->charge ? $modelTasks->charge : 0]) ?>
            
            <?= $form->field($modelTasks, 'paid')->checkbox() ?>

            <?= $form->field($modelTasks, 'status')->dropDownList(
                CommonHelper::transArray(Yii::$app->params['task.status'])
            ) ?>
            <div class="padding-v-md">
                <div class="line line-dashed"></div>
            </div>
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'min' => 0, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelTasksDetail[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'accessories_id',
                    'accessories_price',
                    'accessories_charge',
                    'accessories_qty'
                ],
            ]); ?>
                <div class="panel panel-primary">
                    
                    <div class="panel-body container-items"><!-- widgetContainer -->
                        <?php foreach ($modelTasksDetail as $index => $modelTaskDetail): ?>
                            <div class="item panel panel-default"><!-- widgetBody -->
                                <div class="panel-heading">
                                    <span class="panel-title-dynamicform"><?=Yii::t('app', 'Accessories')?>: <?= ($index + 1) ?></span>
                                    <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body detail-item">
                                    <?php
                                        // necessary for update action.
                                        if (!$modelTaskDetail->isNewRecord) {
                                            echo Html::activeHiddenInput($modelTaskDetail, "[{$index}]id");
                                        }
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                        <?= $form->field($modelTaskDetail, "[{$index}]accessories_id")->dropDownList(
                                                ArrayHelper::map(Accessories::find()->all(), 'id', 'name'),
                                                ['prompt'=> Yii::t('app', '-Choose a Acessories-')]
                                            ) ?>
                                            <?php
                                            /*echo $form->field($modelTaskDetail, "[{$index}]accessories_id")->widget(Select2::classname(), [
                                                'options' => ['placeholder' => Yii::t('app', 'Search for a accessories ...')],
                                                //'pluginLoading' => false,
                                                'pluginOptions' => [
                                                    'allowClear' => true,
                                                    'minimumInputLength' => 3,
                                                    'language' => [
                                                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                                    ],
                                                    'ajax' => [
                                                        'url' => $url,
                                                        'dataType' => 'json',
                                                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                                    ],
                                                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                                    'templateResult' => new JsExpression('function(rs) { return rs.text; }'),
                                                    'templateSelection' => new JsExpression('function (rs) { return rs.text; }'),
                                                ],
                                            ]);*/
                                            ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= $form->field($modelTaskDetail, "[{$index}]accessories_price")->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div><!-- end:row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?= $form->field($modelTaskDetail, "[{$index}]accessories_charge")->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= $form->field($modelTaskDetail, "[{$index}]accessories_qty")->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div><!-- end:row -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="pull-right add-item btn btn-primary btn-xs"><i class="glyphicon glyphicon-plus"></i> <?=Yii::t('app', 'Add accessories')?></button>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
        </div>
    
    

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>