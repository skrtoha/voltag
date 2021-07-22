<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%filter_value}}".
 *
 * @property int $id
 * @property string $title
 * @property int $filter_id
 * @property int $category_id
 *
 * @property Category $category
 * @property Filter $filter
 */
class FilterValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%filter_value}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'filter_id'], 'required'],
            [['filter_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title', 'filter_id'], 'unique', 'targetAttribute' => ['title', 'filter_id']],
            [['filter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filter::className(), 'targetAttribute' => ['filter_id' => 'id']],
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
            'filter_id' => 'Фильтр'
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
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
    
    public function getFilterTitle(){
        $filterList = Filter::getList();
        return $filterList[$this->filter_id];
    }
}
