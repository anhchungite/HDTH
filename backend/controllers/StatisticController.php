<?php
namespace backend\controllers;

use Yii;

/**
 * Site controller
 */
class StatisticController extends BaseController
{
    
    public function actionIndex()
    {
        
        $taskStat = $this->randomData();
        $accessoriesStat = $this->randomData();
        $totalStat = $this->randomData();
        return $this->render('index', [
            'taskStat' => $taskStat,
            'accessoriesStat' => $accessoriesStat,
            'totalStat' => $totalStat
        ]);
    }

    private function randomData() {
        $i = 1;
        $data = [];
        while($i <= 12) {
            $data[] = rand(1000000,10000000);
            $i++;
        }
        return $data;
    }
}
