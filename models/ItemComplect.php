<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_complect".
 *
 * @property int $item_id
 * @property int $item_id_complect
 *
 * @property Item $item
 * @property Item $itemIdComplect
 */
class ItemComplect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_complect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'item_id_complect'], 'required'],
            [['item_id', 'item_id_complect'], 'integer'],
            [['item_id', 'item_id_complect'], 'unique', 'targetAttribute' => ['item_id', 'item_id_complect']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['item_id_complect'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id_complect' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'item_id_complect' => 'Item Id Complect',
        ];
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

    /**
     * Gets query for [[ItemIdComplect]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemIdComplect()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id_complect']);
    }
}
