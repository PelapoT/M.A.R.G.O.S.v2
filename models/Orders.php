<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $merch_id
 * @property int $user_id
 * @property string|null $address
 *
 * @property Merch $merch
 * @property User $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['merch_id', 'user_id'], 'required'],
            [['id', 'merch_id', 'user_id'], 'integer'],
            [['address'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['merch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Merch::class, 'targetAttribute' => ['merch_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merch_id' => 'Merch ID',
            'user_id' => 'User ID',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Merch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMerch()
    {
        return $this->hasOne(Merch::class, ['id' => 'merch_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
    public function fields()
    {
        $fields = parent::fields();
        //удаляем небезопасные поля
        unset ($fields['id'], $fields['merch_id'], $fields['user_id']);
        return $fields;
    }
}
