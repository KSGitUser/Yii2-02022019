<?php

namespace app\models\tables;

use Yii;

use yii\db\ActiveRecord;




/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $responsible_id
 * @property string $date
 * @property int $status_id
 *
 * @property Users $responsible
 */
class Tasks extends \yii\db\ActiveRecord
{
    const EVENT_RUN_START = 'run_start';
    const EVENT_RUN_PROCESS = 'run_process';
    const EVENT_RUN_FINISH = 'run_finish';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            [['description'], 'string'],
            [['responsible_id', 'status_id'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['responsible_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['responsible_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'responsible_id' => 'Responsible ID',
            'date' => 'Date',
            'status_id' => 'Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsible()
    {
        return $this->hasOne(Users::className(), ['id' => 'responsible_id']);
    }

    public function run()
    {
        $this->trigger(static::EVENT_RUN_START);
        echo "Метод run запущен<br>";
        echo "Метод run выполняется<br>";
        echo "Метод run завершен<br>";
      
    }
}
