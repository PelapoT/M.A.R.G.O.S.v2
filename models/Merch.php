<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "merch".
 *
 * @property string $name_merch
 * @property string|null $pic_merch
 * @property string $price_merch
 * @property string $info_merch
 * @property int $id
 *
 * @property Orders[] $orders
 */
class Merch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'merch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_merch', 'price_merch', 'info_merch'], 'required'],
            [['info_merch'], 'string'],
            [['name_merch'], 'string', 'max' => 50],
            [['pic_merch'], 'string', 'max' => 250],
            [['price_merch'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name_merch' => 'Name Merch',
            'pic_merch' => 'Pic Merch',
            'price_merch' => 'Price Merch',
            'info_merch' => 'Info Merch',
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['merch_id' => 'id']);
    }
}
