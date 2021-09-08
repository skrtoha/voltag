<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property string $title
 * @property string|null $created
 *
 * @property ItemCar[] $itemCars
 * @property Item[] $items
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'created' => 'Создан',
        ];
    }

    /**
     * Gets query for [[ItemCars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemCars()
    {
        return $this->hasMany(ItemCar::className(), ['car_id' => 'id']);
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['id' => 'item_id'])->viaTable('item_car', ['car_id' => 'id']);
    }
}
