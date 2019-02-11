<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\tables\Tasks;
use app\controllers\TaskController;
use app\models\TasksSearch;

class WidgetController extends Controller
{

  public function actionIndex()
  {

    $searchModel = new TasksSearch();
    $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
  ]);
    
   /*  $models = (new Tasks())->find()->all();
    return $this->render('index', ['models' =>$models]);   */
  }
  

}