<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_aggregate".
 *
 * @property int $item_id
 * @property int $item_id_aggregate
 *
 * @property Item $itemIdAggregate
 */
class ItemAggregate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_aggregate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'item_id_aggregate'], 'required'],
            [['item_id', 'item_id_aggregate'], 'integer'],
            [['item_id', 'item_id_aggregate'], 'unique', 'targetAttribute' => ['item_id', 'item_id_aggregate']],
            [['item_id_aggregate'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id_aggregate' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'item_id_aggregate' => 'Item Id Aggregate',
        ];
    }

    /**
     * Gets query for [[ItemIdAggregate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemIdAggregate()
    {
        return $this->hasOne(Item::class, ['id' => 'item_id']);
    }
    
    public function getAggregate(){
        return $this->hasOne(Item::class, ['id' => 'item_id_aggregate']);
    }
}
