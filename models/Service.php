<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $name_service
 * @property string|null $pic_service
 * @property string $price_service
 * @property string $info_service
 *
 * @property Request[] $requests
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_service', 'price_service', 'info_service'], 'required'],
            [['info_service'], 'string'],
            [['name_service'], 'string', 'max' => 30],
            [['pic_service'], 'string', 'max' => 250],
            [['price_service'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_service' => 'Name Service',
            'pic_service' => 'Pic Service',
            'price_service' => 'Price Service',
            'info_service' => 'Info Service',
        ];
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::class, ['servise_id' => 'id']);
    }

    public function fields()
    {
        $fields = parent::fields();
        //удаляем небезопасные поля
        unset ($fields['id']);
        return $fields;
    }
}
