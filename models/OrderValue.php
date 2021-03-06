<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_value".
 *
 * @property int $id
 * @property int $order_id
 * @property int $item_id
 * @property int $price
 * @property int $quan
 */
class OrderValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_value';
    }
    
    public function attributes(){
        $attributes = parent::attributes();
        $attributes[] = 'title';
        $attributes[] = 'brend';
        $attributes[] = 'article';
        return $attributes;
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'item_id', 'price', 'quan'], 'required'],
            [['order_id', 'item_id', 'price', 'quan'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'item_id' => 'Item ID',
            'price' => 'Цена',
            'quan' => 'Количество',
            'title' => 'Наименование',
            'brend' => 'Бренд',
            'article' => 'Артикул'
        ];
    }
}
