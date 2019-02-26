<?php

namespace app\components;

use yii\web\Controller;
use app\models\tables\Tasks;
use yii\base\Event;
use yii\db\ActiveRecord;
use app\models\SendEmail;
use yii\helpers\Html;
use yii\base\ModelEvent;
use yii\base\Exception;

class EventController extends ActiveRecord
{
  public function init()
  {
    Event::on(Tasks::class, ActiveRecord::EVENT_AFTER_INSERT,
    function ($event) {
        $model = $event->sender;
        $user = $model->responsible;
        $sendEmail = new SendEmail([
            'name' => $user->username,
            'email' => $user->email,
            'subject' => 'Created new task',
        ]);
        $sendEmail->body = 'Создана новая задача ' . Html::a($model->name, ['tasks/view', 'id' => $model->id]);
        if (!$sendEmail->contact($user->email)) {
          throw new Exception('Ошибка при отправке письма');
        };
    });
  }


}