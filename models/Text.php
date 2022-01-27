<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "text".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string $type
 * @property string $content
 * @property string|null $updated
 * @property string|null $created
 */
class Text extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type', 'content'], 'required'],
            [['content'], 'string'],
            [['updated', 'created'], 'safe'],
            [['title', 'alias', 'type'], 'string', 'max' => 255],
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
            'alias' => 'Алиас',
            'type' => 'Тип',
            'content' => 'Содержимое',
            'updated' => 'Updated',
            'created' => 'Created',
        ];
    }
}
