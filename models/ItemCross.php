<?php

namespace app\models;

use Yii;

/**
<<<<<<< HEAD
 * This is the model class for table "item_cross".
=======
 * This is the model class for table "{{%item_cross}}".
>>>>>>> 37630d3a89fbd5313b0b94017cd92ff76403d405
 *
 * @property int $item_id
 * @property int $cross_id
 * @property string $created
 *
 * @property Cross $cross
 * @property Item $item
 */
class ItemCross extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
<<<<<<< HEAD
        return 'item_cross';
=======
        return '{{%item_cross}}';
>>>>>>> 37630d3a89fbd5313b0b94017cd92ff76403d405
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'cross_id'], 'required'],
            [['item_id', 'cross_id'], 'integer'],
            [['created'], 'safe'],
            [['item_id', 'cross_id'], 'unique', 'targetAttribute' => ['item_id', 'cross_id']],
            [['cross_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cross::className(), 'targetAttribute' => ['cross_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'cross_id' => 'Cross ID',
            'created' => 'Created',
        ];
    }

    /**
     * Gets query for [[Cross]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCross()
    {
        return $this->hasOne(Cross::className(), ['id' => 'cross_id']);
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
