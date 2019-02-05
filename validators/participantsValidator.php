<?php

namespace app\validators;

use yii\validators\Validator;
use yii\validators\EmailValidator;

class ParticipantsValidator extends Validator
{

    public function validateAttribute($model, $attribute)
    {
          
        if (!is_array($model->$attribute)) {
            $this->addError($model, $attribute, "{$attribute} должен быть массивом из имени пользователя и почты");
        } else {
            foreach ($model->$attribute as $key => $value) {
              if (is_array($value)) {
              
                foreach ($value as $innerKey => $innerValue) {
                  $this->checkData($innerKey, $innerValue, $model, $attribute);
                 /*  var_dump($innerKey); exit; */
                }
              } else {
                $this->checkData($key, $value, $model, $attribute);
              }
                 

            }
        } 
         
            
      
    }

    public function checkData($key, $value, $model, $attribute) {
      $validator = new EmailValidator();  
      if (($key !=='name') && ($key !== 'email')) {
        $this->addError($model, $attribute, "Не верно указан ключ {$key} в массиве {$attribute}");
    } else {    
      if (($key === 'email') && (!$validator->validate($value, $error))) {
        $this->addError($model, $attribute, "Не верно указан {$value} в массиве2 {$attribute}");
       }
    }
    }

}
