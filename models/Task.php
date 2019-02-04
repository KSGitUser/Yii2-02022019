<?php

namespace app\models;

use yii\base\Model;

class Task extends Model
{

  public $columnName;
  public $title;
  public $description;
  public $comments;
  public $participants;
  public $tags;
  public $checkList;
  public $deadline;
  public $attachments;
  public $actions;
  public $creationDate;

  public function attributeLabels() 
  {
    return [
      'columnName' => 'Имя колонки',
      'title' => 'Название задачи',
      'description' => 'Описание', 
      'comments' => 'Комментарии',
      'participants' => 'Участники',
      'tags' => 'Метки',
      'checkList' => 'Чек-лист',
      'deadline' => 'Срок',
      'attachments' => 'Вложения',
      'actions' => 'Действия',
      'creationDate' => 'Дата создания',

    ];
  }

  public function rules()
  {
    return [
      [['columnName', 'title', 'creationDate'], 'required'],
      [['columnName', 'title'], 'string'],
      [['deadline', 'creationDate'], 'date'],
      ['creationDate', 'date', 'timestampAttribute' => 'creationDate'],
      ['deadline', 'date', 'timestampAttribute' => 'deadline'],
    ];
  }


}