<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%brend}}".
 *
 * @property int $id
 * @property string $title
 */
class Brend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%brend}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование',
        ];
    }
    
    public static function getList($params = []){
        static $output;
        if (!$output){
            $result = Brend::find()->asArray()->all();
            $output = ArrayHelper::map($result, 'id', 'title');
        }
        return $output;
    }
}
