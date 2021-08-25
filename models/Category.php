<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property int $id
 * @property string $title
 * @property string $transliteration
 * @property int|null $parent_id
 * @property int|null $sort
 */
class Category extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'transliteration',
                'attribute' => 'transliteration',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['id', 'parent_id', 'sort'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title', 'parent_id'], 'unique', 'targetAttribute' => ['title', 'parent_id']],
            [['id', 'transliteration'], 'unique'],
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
            'parent_id' => 'Родитель',
            'transliteration' => 'Транслит',
            'sort' => 'Сортировка',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
    
    public function fields()
    {
        $fields = parent::fields();
        $fields['parent'] = '';
        return $fields;
    }
    
    public static function getMain($withNullElement = false){
        static $output;
        if (!$output){
            $output = [];
            $mainCategories = Category::find()
                ->where(['parent_id' => 0])
                ->orderBy(['title' => SORT_ASC])
                ->asArray()
                ->all();
            if ($withNullElement) $output[0] = 'ничего не выбрано';
            if (empty($mainCategories)) return $output;
            foreach($mainCategories as $value){
                $output[$value['id']] = $value['title'];
            }
        }
        return $output;
    }
    
    public static function getCommonList(){
        static $output;
        if (!$output){
            $result = Category::find()
                ->from(['main' => Category::tableName()])
                ->select([
                    'main.id',
                    "IF(
                        sub.title IS NOT NULL,
                        CONCAT(sub.title, ' > ', main.title),
                        main.title
                    ) AS category",
                    'main.parent_id'
                ])
                ->leftJoin(['sub' => Category::tableName()], "main.parent_id = sub.id")
                ->orderBy([
                    'main.title' => SORT_ASC,
                    'sub.title' => SORT_ASC,
                ])
                ->asArray()
                ->all();
            $output = ArrayHelper::map($result, 'id', 'category');
        }
        return $output;
    }
    
    public function getParentName(){
        $mainCategories = self::getMain();
        return $mainCategories[$this->parent_id];
    }
    
    public static function getTree($selected = false){
        $output = [];
        $commonList = self::find()->orderBy(['sort' => SORT_ASC])->asArray()->all();
        foreach($commonList as $value){
            $array = [
                'id' => $value['id'],
                'href' => '/catalog/'.$value['transliteration'],
                'state' => [
                    'selected' => $selected == $value['transliteration'],
                ],
                'text' => $value['title']
            ];
            if ($value['parent_id'] == '0'){
                $output[$value['id']] = $array;
            }
            else $output[$value['parent_id']]['nodes'][$value['id']] = $array;
        }
        $output = array_values($output);
        foreach($output as & $value){
            if (isset($value['nodes'])) $value['nodes'] = array_values($value['nodes']);
        }
        return $output;
    }
    
    public function save($runValidation = true, $attributeNames = null){
        if (!$this->transliteration) $this->transliteration = Inflector::slug($this->title);
        return parent::save(true); // TODO: Change the autogenerated stub
    }
}
