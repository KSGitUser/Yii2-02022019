<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\tables\Tasks;
use yii\base\Event;
use yii\db\ActiveRecord;
use app\models\SendEmail;
use yii\helpers\Html;
use yii\base\ModelEvent;

class EventController extends ModelEvent
{
  public function init()
  {
    Event::on(Tasks::className(), ActiveRecord::EVENT_AFTER_INSERT,
    function ($event) {
        $model = $event->sender;
        $user = $model->responsible;
        $sendEmail = new SendEmail([
            'name' => $user->username,
            'email' => $user->email,
            'subject' => 'Created new task',
        ]);
        $sendEmail->body = 'Создана новая задача ' . Html::a($model->name, ['tasks/view', 'id' => $model->id]);
        $sendEmail->contact($user->email);
    });
  }
}