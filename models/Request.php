<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $servise_id
 * @property string|null $info_request
 * @property string|null $email
 *
 * @property Service $servise
 * @property User $user
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'servise_id'], 'integer'],
            [['info_request'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 50],
            [['servise_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['servise_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'servise_id' => 'Servise ID',
            'info_request' => 'Info Request',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Servise]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServise()
    {
        return $this->hasOne(Service::class, ['id' => 'servise_id']);
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
}
