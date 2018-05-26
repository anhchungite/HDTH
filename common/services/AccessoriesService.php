<?php
namespace common\services;
use yii\db\Query;
use backend\models\Accessories;
class AccessoriesService {

    public static function filterByName($q = null) {
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id, name AS text')
                ->from('accessories')
                ->where(['like', 'name', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        return $out;
    }

    public static function getDetail($id) {
        $model = new Accessories();
        $accessories = $model->findOne(['id' => $id]); 
        $data = [
            'id' => $accessories->id,
            'name' => $accessories->name,
            'charge' => $accessories->charge,
            'price' => $accessories->price,
        ];
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'result' => $data,
        ];
    }
}