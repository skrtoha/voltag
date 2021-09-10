<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model{
    public static $path = 'D:/OpenServer/domains/voltag/upload';
    /**
     * @var UploadedFile
     */
    public $imageFile;
    
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload($item_id, $type)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(self::$path."/$type/$item_id/" . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}