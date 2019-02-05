<?php

namespace app\models;

use yii\base\Model;
use app\validators\ParticipantsValidator;

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
      [['columnName', 'title'], 'required'],
      [['columnName', 'title', 'description', 'comments', 'actions'], 'string'],
      [['deadline', 'creationDate'], 'date'],
      ['creationDate', 'date', 'timestampAttribute' => 'creationDate'],
      ['deadline', 'date', 'timestampAttribute' => 'deadline'],
      ['creationDate', 'default', 'value' => time()],
      ['attachments', 'file', 'extensions' => ['png', 'jpg', 'gif', 'doc', 'pdf']],
      ['participants', ParticipantsValidator::class],
      ['tags', 'integer']

    ];
  }




}