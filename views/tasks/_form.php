<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\tables\Users;
use yii\helpers\Url;

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
    <?= $this->render('@app/views/upload/index.php', ['model' => $imageModel, 'form' => $form]) ?>

     <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="form_comments">
    <h3>Комментарии</h3>
    <?php $formComments = ActiveForm::begin(['action' => Url::to(['tasks/add-comment'])]);?>
    <?= $formComments->field($taskCommentForm, 'user_id')->hiddenInput(['value' => $userId])->label(false);?>
    <?= $formComments->field($taskCommentForm, 'task_id')->hiddenInput(['value' => $model->id])->label(false); ?>
    <?= $formComments->field($taskCommentForm, 'comment')->textInput(); ?>
    <?= Html::submitButton("Add", ['class' => 'btn btn-default']); ?>
    <?ActiveForm::end() ?>
    <hr>
    <div class="comment-history">
        <?foreach ($model->comments as $comment): ?>
            <p><strong><?= $comment->user->username?></strong>: <?= $comment->comment ?> </p>
        <?php endforeach;?>
    </div>  
</div>



</div>
