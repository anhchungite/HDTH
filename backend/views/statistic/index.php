<?php
use dosamigos\chartjs\ChartJs;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\web\View;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center year-select">
        <button class="btn btn-default" onclick="generateYears('prev')"><span class="glyphicon glyphicon-chevron-left"></span></button>
        <div class="btn-group year-area"></div>
        <button class="btn btn-default" onclick="generateYears('next')"><span class="glyphicon glyphicon-chevron-right"></span></button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <canvas id="canvas" height="400"></canvas>
    </div>
</div>

<?php
$this->registerJS('
var chartConfig = {};
chartConfig.labels = ' . json_encode(\common\helpers\CommonHelper::transArray(Yii::$app->params['time.months'])) . ';
chartConfig.label = [
    "'.Yii::t('app','Task').'","'.Yii::t('app','Accessories').'","'.Yii::t('app','Total revenue').'"
];
', View::POS_BEGIN);
$this->registerJSFile('js/Chart.bundle.js');
$this->registerJSFile('js/Chart.config.js', ['position' => View::POS_END]);
$this->registerJS("
var ctx = document.getElementById('canvas').getContext('2d');
window.myLine = new Chart(ctx, config);
", View::POS_LOAD);

?>