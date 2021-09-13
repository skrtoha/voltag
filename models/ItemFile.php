<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "item_file".
 *
 * @property int $item_id
 * @property int $file_id
 *
 * @property File $file
 * @property Item $item
 */
class ItemFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'file_id'], 'required'],
            [['item_id', 'file_id'], 'integer'],
            [['item_id', 'file_id'], 'unique', 'targetAttribute' => ['item_id', 'file_id']],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['file_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }
    
    public function attributes(){
        $attributes = parent::attributes();
        $attributes[] = 'fullPath';
        return $attributes;
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'file_id' => 'File ID',
            'fullPath' => 'Изображения'
        ];
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::className(), ['id' => 'file_id']);
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }
    
    public static function getPathList($params = []): ActiveQuery
    {
        $query = self::find()
            ->from(['if' => self::tableName()])
            ->select([
                'if.item_id',
                'if.file_id',
                'fullPath' => "CONCAT('".Yii::$app->params['imgUrl']."', f.path, f.title)"
            ])
            ->leftJoin(['f' => File::tableName()], "f.id = if.file_id");
        
        if (empty($params)) return $query;
        
        foreach($params as $key => $value){
            switch($key){
                case 'item_id':
                    $query->andWhere([$key => $value]);
                    break;
                    
            }
        }
        
        return $query;
    }
}
