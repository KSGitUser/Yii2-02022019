<?php

namespace app\controllers;

use yii\web\Controller;


class TaskController extends Controller 

{


  public function actionIndex()
  {
    echo "index"; exit;
  }

  public function actionTest()
  {
    return $this->render('test', [
      'title' => 'Yii2 course',
      'content' => 'Lesson1'
    ]);
  }

}