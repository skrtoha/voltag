<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%filter_value}}".
 *
 * @property int $id
 * @property string $title
 * @property string $signment
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
            [['title', 'signment'], 'string', 'max' => 255],
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
            'signment' => 'Обозначение',
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
    
    public static function getList($params = []){
        $query = FilterValue::find()
            ->from(['fv' => self::tableName()])
            ->leftJoin(['f' => Filter::tableName()], "f.id = fv.filter_id")
            ->andWhere(['f.enum' => 1])
            ->select([
                'fv.*',
                'filter' => 'f.title'
            ]);
        foreach($params as $key => $value){
            switch ($key){
                case 'filter_id':
                    $query->andWhere([$key => $value]);
                    break;
            }
        }
        $result = $query->asArray()->all();
        
        if (!$result) return [];
        
        $output = [];
        foreach($result as $value){
            $v = & $output[$value['filter_id']];
            $v['title'] = $value['filter'];
            $v['signment'] = $value['signment'];
            $v['category_id'] = $value['category_id'];
            $v['filter_id'] = $value['filter_id'];
            $v['values'][$value['id']]['id'] = $value['id'];
            $v['values'][$value['id']]['title'] = $value['title'];
        }
        return $output;
    }
    
    public function getFilterTitle(){
        $filterList = Filter::getList();
        return $filterList[$this->filter_id];
    }
}
