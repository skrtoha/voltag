<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    
    public function attributeLabels(){
        return [
            'imageFile' => 'Изображение'
        ];
    }
    
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 5],
        ];
    }
    
    public function upload($type, $item_id = false)
    {
        $folder = \Yii::$app->params['imgPath'].'/'.$type;
        if (!file_exists($folder)) mkdir($folder);
        if ($item_id){
            $folder .= "/$item_id";
            if (!file_exists($folder)) mkdir($folder);
        }
        
        if ($this->validate()) {
            foreach($this->imageFile as $file){
                $file->saveAs("$folder/$file->baseName.$file->extension");
            }
            return true;
        } else {
            return false;
        }
    }
}