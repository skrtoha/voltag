<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%filter}}".
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 *
 * @property Category $category
 */
class Filter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%filter}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['category_id', 'title'], 'unique', 'targetAttribute' => ['category_id', 'title']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Категория',
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
    
    public static function getList($params = []){
        static $output;
        if (!$output){
            $result = self::find()
                ->select(['id', 'title'])
                ->orderBy('title')
                ->asArray()
                ->all();
            $output = ArrayHelper::map($result, 'id', 'title');
        }
        return $output;
    }
    
    public function getCategoryTitle($category_id = false){
        $categoriesList = Category::getCommonList();
        if (!$category_id) return $categoriesList[$this->category_id];
        return $categoriesList[$category_id];
    }
}
