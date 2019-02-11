<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\tables\Users;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'responsible_id')->dropDownList($array, ['prompt'=>'Select username',]); ?>


    <?= $form->field($model, 'date')->widget(\yii\widgets\MaskedInput::className(), [ 'mask' => '9999/99/99',]); ?>

    <?= $form->field($model, 'status_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
