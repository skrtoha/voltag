<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_car".
 *
 * @property int $item_id
 * @property int $car_id
 * @property string|null $created
 *
 * @property Car $car
 * @property Item $item
 */
class ItemCar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'car_id'], 'required'],
            [['item_id', 'car_id'], 'integer'],
            [['created'], 'safe'],
            [['item_id', 'car_id'], 'unique', 'targetAttribute' => ['item_id', 'car_id']],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }
    
    public static function getList($params = []){
        $query = self::find()
            ->from(['ic' => self::tableName()])
            ->select([
                'i.brend_id',
                'brend_title' => 'b.title',
                'item_title' => 'i.title',
                'item_article' => 'i.article',
                'car_title' => 'c.title'
            ])
            ->leftJoin(['c' => Car::tableName()], "c.id = ic.car_id")
            ->leftJoin(['i' => Item::tableName()], "i.id = ic.item_id")
            ->leftJoin(['b' => Brend::tableName()], "i.brend_id = b.id");
        
        if(empty($params)) return $query;
        
        foreach($params as $key => $value){
            switch($key){
                case 'item_id':
                    $query->andWhere(['ic.item_id' => $value]);
                    break;
            }
        }
        
        return $query;
    }
    
    public function attributes(){
        $attributes = parent::attributes();
        $attributes[] = 'car_title';
        return $attributes;
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_title' => 'Наименование',
            'item_id' => 'Item ID',
            'car_id' => 'Car ID',
            'created' => 'Created',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['id' => 'car_id']);
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
}
