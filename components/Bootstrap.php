<?php

namespace app\components;

use Yii;
use \yii\base\Component;

class Bootstrap extends Component
{

  public function init()
  {
    $this->setLanguageSettings();
  }
  private function setLanguageSettings()
  {
    if ($lang = Yii::$app->session->get('lang')) {
      Yii::$app->language = $lang;
    };
  
  }
} 