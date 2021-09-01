<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%item_value}}".
 *
 * @property int $item_id
 * @property int $filter_id
 * @property string|null $value
 * @property int|null $filter_value_id
 *
 * @property Filter $filter
 * @property FilterValue $filterValue
 * @property Item $item
 */
class ItemValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%item_value}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'filter_id'], 'required'],
            [['item_id', 'filter_id', 'filter_value_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['item_id', 'filter_id'], 'unique', 'targetAttribute' => ['item_id', 'filter_id']],
            [['filter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filter::className(), 'targetAttribute' => ['filter_id' => 'id']],
            [['filter_value_id'], 'exist', 'skipOnError' => true, 'targetClass' => FilterValue::className(), 'targetAttribute' => ['filter_value_id' => 'id']],
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
            'filter_id' => 'Filter ID',
            'value' => 'Value',
            'filter_value_id' => 'Filter Value ID',
        ];
    }

    /**
     * Gets query for [[Filter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilter()
    {
        return $this->hasOne(Filter::className(), ['id' => 'filter_id']);
    }

    /**
     * Gets query for [[FilterValue]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilterValue()
    {
        return $this->hasOne(FilterValue::className(), ['id' => 'filter_value_id']);
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
    
    public static function getQuery($params = []){
        $query = self::find()
            ->from(['iv' => self::tableName()])
            ->leftJoin(['fv' => FilterValue::tableName()], "fv.id = iv.filter_value_id")
            ->leftJoin(['f' => Filter::tableName()], "f.id = iv.filter_id")
            ->select([
                'iv.item_id',
                'iv.filter_id',
                'filter' => 'f.title',
                'iv.filter_value_id',
                'f.enum',
                "CASE
                    WHEN `iv`.`filter_value_id` IS NULL THEN `iv`.`value`
                    ELSE `fv`.`title`
                END AS value"
            ]);
        foreach($params as $key => $value){
            switch($key){
                case 'item_id':
                    $query->andWhere(['iv.item_id' => $value]);
                    break;
            }
        }
        return $query;
    }
}
