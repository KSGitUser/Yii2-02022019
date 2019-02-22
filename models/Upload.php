<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\imagine\Image;


class Upload extends Model
{

/*     public $title;
    public $content; */
    public $file;

    public function rules()
    {
        return [
         /*    [['title', 'content'], 'safe' ], */
            ['file', 'file', 'extensions' => 'jpg, png, jpeg']
        ];
    }

    public function run()
    {
        if ($this->validate()) {
        $filename = $this->file->getBaseName() . "."
                     . $this->file->getExtension();
        $filepath = Yii::getAlias("@img/{$filename}");
        $this->file->saveAs($filepath);
        Image::thumbnail($filepath, 100, 100)->save(Yii::getAlias("@img/small/{$filename}"));
        return true;
        } else {
            return false;
        }        
    }


    public function actionLang() {
        Yii::$app->language = 'en';

    }
   
}
