<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $addressee
 * @property string $delivery
 * @property string $pay_type
 * @property string $comment
 * @property string $inserted
 * @property string $updated
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'delivery'], 'required'],
            [['delivery', 'pay_type', 'comment'], 'string'],
            [['name', 'email', 'phone', 'addressee'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'addressee' => 'Адрес',
            'delivery' => 'Доставка',
            'pay_type' => 'Тип оплаты',
            'comment' => 'Комментарий',
            'inserted' => 'Дата добавления',
            'updated' => 'Дата обновления'
        ];
    }
}
