<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Task;
use Faker\Provider\zh_TW\DateTime;


class TaskController extends Controller 

{
  public $model;


  public function actionIndex()
  {
    echo "index"; exit;
  }

  public function actionTest()
  {
    $this->actionTask();
    return $this->render('test', [
      'title' => $this->model->columnName,
      'content' => $this->model->title,
      'creationDate' => date('Y-m-d', $this->model->creationDate),
    ]);
  }

  public function actionTask()
  {
    $this->model = new Task();
    $this->model->columnName = 'Основные задачи';
    $this->model->title = 'Задача №1';
    $this->model->creationDate = time();  

  }


}