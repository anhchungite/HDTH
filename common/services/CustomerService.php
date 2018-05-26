<?php
namespace common\services;
use yii\db\Query;
class CustomerService {

    public static function filterByName($q = null) {
        $out = [];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('customer')
                ->distinct()
                ->from('tasks')
                ->where(['like', 'customer', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out = array_values($data);
        }
        return $out;
    }
}