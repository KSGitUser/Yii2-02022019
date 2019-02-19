<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<div class="tasks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
         'enableClientValidation'=>'false'


    ]); ?>

    <?= $form->field($model, 'created')->dropDownList([
        'null' => 'все',
        '1' => 'январь',
        '2' => 'февраль',
        '3' => 'март',
        '4' => 'апрель',
        '5' => 'май',
        '6' => 'июнь',
        '7' => 'июль',
        '8' => 'август',
        '9' => 'сентябрь',
        '10' => 'октябрь',
        '11' => 'ноябрь',
        '12' => 'декабрь',
    ],
    ['multiple' => 'true'])?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
