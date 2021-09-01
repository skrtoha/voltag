<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cross}}".
 *
 * @property int $id
 * @property int $brend_id
 * @property string $title
 * @property string|null $created
 *
 * @property Brend $brend
 */
class Cross extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cross}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brend_id', 'title'], 'required'],
            [['brend_id'], 'integer'],
            [['created'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['brend_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brend::className(), 'targetAttribute' => ['brend_id' => 'id']],
        ];
    }
    
    public function getTitleBrend(){
        $brendList = Brend::getList();
        return $brendList[$this->brend_id];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brend_id' => 'Бренд',
            'title' => 'Наименование',
            'created' => 'Created',
        ];
    }

    /**
     * Gets query for [[Brend]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrend()
    {
        return $this->hasOne(Brend::className(), ['id' => 'brend_id']);
    }
}
