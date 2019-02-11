<?php

/** @var \app\models\tables\Tasks $model */
use yii\bootstrap\ActiveForm;
use \app\widgets\TaskCard;

/* $form = ActiveForm::begin();
echo $form->field($model, 'name')->textInput();
echo $form->field($model, 'description')->textArea();


ActiveForm::end(); */


echo \yii\widgets\ListView::widget([
  'dataProvider' => $dataProvider,
  "itemView" => function($model, $key, $index, $widget) {
    return TaskCard::widget(['model' => $model]);
  }

]);


/* echo TaskCard::widget(['model' => $model]); */



