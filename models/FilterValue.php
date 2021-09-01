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
        $query = Filter::find()
            ->from(['f' => Filter::tableName()])
            ->leftJoin(['fv' => FilterValue::tableName()], "f.id = fv.filter_id")
            ->leftJoin(['c' => Category::tableName()], "c.id = f.category_id")
            ->select([
                'filter_id' => 'f.id',
                'filter' => 'f.title',
                'filter_value_id' => 'fv.id',
                'filter_value' => 'fv.title',
                'f.category_id',
                'f.signment',
                'f.enum',
                'f.measure_string',
                'category' => 'c.title'
            ]);
        foreach($params as $key => $value){
            switch ($key){
                case 'filter_id':
                    $query->andWhere(['f.id' => $value]);
                    break;
                case 'category_id':
                    $query->andWhere(['f.category_id' => $value]);
                    break;
                case 'item_id':
                    $query->addSelect([
                        'iv.item_id',
                        'selected_filter_value_id' => 'iv.filter_value_id',
                        'iv.value'
                    ]);
                    $query->leftJoin(['iv' => ItemValue::tableName()], "
                        (iv.filter_id = f.id OR iv.filter_value_id = fv.id) AND iv.item_id = $value
                    ");
            }
        }
        $result = $query->asArray()->all();
        
        if (!$result) return [];
        
        $output = [];
        foreach($result as $row){
            $v = & $output[$row['filter_id']];
            $v['title'] = $row['filter'];
            $v['signment'] = $row['signment'];
            $v['category_id'] = $row['category_id'];
            $v['filter_id'] = $row['filter_id'];
            $v['enum'] = $row['enum'];
            if (isset($row['item_id']) && $row['item_id']){
                $v['value'] = $row['value'] ?: '';
            }
            
            if ($row['enum']){
                $array = [
                    'id' => $row['filter_value_id'],
                    'title' => $row['filter_value']
                ];
                if (isset($params['item_id']) && $params['item_id']){
                    $array['selected'] = $row['selected_filter_value_id'] == $row['filter_value_id'] ? 1 : 0;
                }
                $v['values'][$row['filter_value_id']] = $array;
            }
        }
        return $output;
    }
    
    public function getFilterTitle(){
        $filterList = Filter::getList();
        return $filterList[$this->filter_id];
    }
}
