<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%item}}".
 *
 * @property int $id
 * @property string $title
 * @property int|null $brend_id
 * @property string $article
 *
 * @property Brend $brend
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'article'], 'required'],
            [['brend_id'], 'integer'],
            [['title', 'article'], 'string', 'max' => 255],
            [['brend_id', 'article'], 'unique', 'targetAttribute' => ['brend_id', 'article']],
            [['brend_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brend::className(), 'targetAttribute' => ['brend_id' => 'id']],
        ];
    }
    
    public function attributes(){
        $attributes = parent::attributes();
        $attributes[] = 'brend';
        return $attributes;
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование',
            'brend_id' => 'Бренд',
            'article' => 'Артикул',
        ];
    }

    /**
     * Gets query for [[Brend]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrend()
    {
        return $this->hasOne(Brend::className(), ['id' => 'brend_id']);
    }
    
    public function getBrendTitle(){
        $brendList = Brend::getList();
        return $brendList[$this->brend_id];
    }
    
    public static function getQuery(){
        return self::find()
            ->select([
                'i.id',
                'title' => 'i.title',
                'i.brend_id',
                'brend' => 'b.title',
                'i.article'
            ])
            ->from(['i' => Item::tableName()])
            ->leftJoin(['b' => Brend::tableName()], "b.id = i.brend_id");
    }
}
