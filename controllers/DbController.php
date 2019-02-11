<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\tables\Tasks;
use yii\db\Query;


class DbController extends Controller 
{



public function actionIndex() 
{
  $db = \Yii::$app->db;
}

public function actionAr()
{
/*   $model = new Task([
    'name' => 'Task 1',
    'description' => 'sdfsdfdsf',
    'creator_id' => 1,
    'responsible_id' => 2,
    'deadline' => date("Y-m-d"),
    'satus_id' => 1,
  ]);

  $model->save(); */
/* 
  $model = Tasks::findOne(1); // поиск одной записи по primary key*/
 /*  $model = Tasks::findOne(['name' => 'Task3']); // поиск одной записи по указанной колонке и значению */
/*   var_dump($model); exit; */

  /* $allRecords = Tasks::find()->all(); */ // читает все записи

  /* $model = Tasks::findOne(1);
  $model->description = 'new description';
  $model->save(); */

/*   $model = Tasks::findOne(4);
  $model->delete(); */

 /*  Tasks::deleteAll('id > 2 OR id < 5 '); // можно написать как в sql запросе 'id > 2 OR id < 5'

  // или так

  Tasks::deleteAll(['>', 'id', '5']); */

  /* $model = Tasks::findOne(1); */

  
//yii\db\ActiveQuery;

$query = new Query();
$query = $query->select(['name', 'description']);
$model = Tasks::find()->select(['name', 'description'])->all();








}

/* public function getStatus() 
{
  return $this->hasOne(TaskStatuses::class, ['id' => 'status_id']);
} // должен быть в другом классе*/

}

