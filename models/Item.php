<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%item}}".
 *
 * @property int $id
 * @property integer $price
 * @property string $title
 * @property int|null $brend_id
 * @property string $article
 * @property string $category_id
 * @property int $is_complect
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
            [['brend_id', 'category_id', 'price'], 'integer'],
            [['title', 'article'], 'string', 'max' => 255],
            [['brend_id', 'article'], 'unique', 'targetAttribute' => ['brend_id', 'article']],
            [['brend_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brend::className(), 'targetAttribute' => ['brend_id' => 'id']],
        ];
    }
    
    public function attributes(){
        $attributes = parent::attributes();
        $attributes[] = 'brend';
        $attributes[] = 'item_id_complect';
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
            'brend_id' => 'Brend Id',
            'brend' => 'Бренд',
            'article' => 'Артикул',
            'price' => 'Цена',
            'category_id' => 'Категория'
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
    
    public function getItemValue(){
        return $this->hasMany(ItemValue::class, ['item_id' => 'id']);
    }
    
    public function getBrendTitle(){
        $brendList = Brend::getList();
        return $brendList[$this->brend_id];
    }
    
    public function getCategoryTitle(){
        $categoryList = Category::getCommonList();
        return $categoryList[$this->category_id];
    }
    
    public static function getQuery(): ActiveQuery
    {
        return self::find()
            ->select([
                'i.id',
                'title' => 'i.title',
                'i.brend_id',
                'brend' => 'b.title',
                'article' => 'i.article',
                'price' => 'i.price',
                'i.category_id',
                'category' => 'c.title'
            ])
            ->from(['i' => Item::tableName()])
            ->leftJoin(['b' => Brend::tableName()], "b.id = i.brend_id")
            ->leftJoin(['c' => Category::tableName()], "c.id = i.category_id");
    }
}
