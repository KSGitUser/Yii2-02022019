<?php
namespace app\commands;

use app\models\tables\Users;
use yii\console\Controller;
use yii\helpers\Console;
use app\models\tables\Tasks;
use app\models\SendEmail;

class TaskController extends Controller
{
    public $message = "hello";

    /**
     * action test
     */
    public function actionTest($id)
    {
        if ($user = Users::findOne($id)) {
            echo $this->message, " ", $user->username;
            return \yii\console\ExitCode::OK;
        }
        return \yii\console\ExitCode::UNSPECIFIED_ERROR;
    }

    public function options($actionId) 
    {
      return [
        'message'
      ];
    }

    public function optionAliases()
    {
      return ['m' => 'message'];
    }

    public function actionProcess()
    {
      Console::startProgress(0,100);
      for($i = 1; $i < 100; $i++){
        sleep(1);
        Console::updateProgress($i, 100);
      }
      Console::endProgress();
    }

    public function actionCheckDeadline()
    {
      $tasks = Tasks::find()->select(['id','name','responsible_id'])->where(['date' => date("Y-m-d H:i:s", strtotime('tomorrow'))])->all();
      foreach ($tasks as $task) {
        $task->getResponsible();
        $userEmail = $task->responsible->email;
        $newEmail = new SendEmail([
          'name' => 'Message from console', 
          'email' => $userEmail,
          'subject' => 'new message from console',
          'body' => 'Your deadline is very closer']);       
        $newEmail->contact($userEmail);
      }
    }


}
