<?php

namespace app\widgets;

use yii\helpers\Html;
use yii\base\Widget;
use yii\bootstrap\ActiveForm;

class TaskCard extends Widget
{
  public $model;

  public function run() {

   $form = ActiveForm::begin(['action' => '\index.php?r=tasks/card-update&id=' . $this->model->id ]);
   echo $form->field($this->model, 'name')->textInput(); 
   echo Html::submitButton('Подробнее',[]); 
   ActiveForm::end();

   
  }
}

