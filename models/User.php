<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nickname
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $document_number
 * @property string $password
 * @property int|null $access_token
 * @property int $is_admin
 *
 * @property Orders[] $orders
 * @property Request[] $requests
 */

class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return ;
    }

    public function validateAuthKey($authKey)
    {
        return ;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nickname', 'first_name', 'last_name', 'phone', 'document_number', 'password'], 'required'],
            [['access_token', 'is_admin'], 'integer'],
            [['nickname', 'first_name', 'last_name', 'phone'], 'string', 'max' => 12],
            [['document_number'], 'string', 'max' => 10],
            [['password'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'document_number' => 'Document Number',
            'password' => 'Password',
            'access_token' => 'Access Token',
            'is_admin' => 'Is Admin',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::class, ['user_id' => 'id']);
    }
}
