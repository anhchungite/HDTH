<?php
use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="row">
            <div class="col-md-12">
            <?= ChartJs::widget([
                'type' => 'line',
                'options' => [
                    'height' => 200,
                    'width' => 500
                ],
                'data' => [
                    'labels' => \common\helpers\CommonHelper::transArray(Yii::$app->params['time.months']),
                    'datasets' => [
                        [
                            'label' => Yii::t('app','Task'),
                            'backgroundColor' => "rgba(179,181,198,0.2)",
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => [65, 59, 90, 81, 56, 55, 40, 30, 30, 30, 30, 30]
                        ],
                        [
                            'label' => Yii::t('app','Accessories'),
                            'backgroundColor' => "rgba(255,99,132,0.2)",
                            'borderColor' => "rgba(255,99,132,1)",
                            'pointBackgroundColor' => "rgba(255,99,132,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(255,99,132,1)",
                            'data' => [28, 48, 40, 19, 96, 27, 100, 50, 60, 70, 80, 85]
                        ],
                        [
                            'label' => Yii::t('app','Total revenue'),
                            'backgroundColor' => "rgba(83, 146, 55,0.2)",
                            'borderColor' => "rgba(83, 146, 55,1)",
                            'pointBackgroundColor' => "rgba(83, 146, 55,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(83, 146, 55,1)",
                            'data' => [20, 30, 40, 25, 50, 35, 10, 80, 60, 40, 45, 75]
                        ]
                    ]
                ]
            ]); ?>
            </div>
        </div>