<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$close = false;


if (!$form) {
  $form = ActiveForm::begin();
  $close=true;
}
/*  */
/* echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'content')->textInput(); */
echo $form->field($model, 'file')->fileInput();
if ($close) {
  echo Html::submitButton('Submit', ['class' => 'btn btn-submit']);
  ActiveForm::end();
}
