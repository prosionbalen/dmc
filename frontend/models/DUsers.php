<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "d_users".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property integer $role
 * @property string $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property DUserDetail[] $dUserDetails
 * @property DRole $role0
 * @property FOrder[] $fOrders
 */
class DUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'role'], 'required'],
            [['role', 'created_at', 'updated_at'], 'integer'],
            [['username'], 'string', 'max' => 127],
            [['email', 'password'], 'string', 'max' => 255],
            [['password_hash', 'password_reset_token', 'auth_key', 'status'], 'string', 'max' => 64],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'user id'),
            'username' => Yii::t('app', 'username'),
            'email' => Yii::t('app', 'email'),
            'password' => Yii::t('app', 'password'),
            'password_hash' => Yii::t('app', 'password hash'),
            'password_reset_token' => Yii::t('app', 'password reset token'),
            'auth_key' => Yii::t('app', 'auth key'),
            'role' => Yii::t('app', 'memter type'),
            'status' => Yii::t('app', 'status'),
            'created_at' => Yii::t('app', 'registration date'),
            'updated_at' => Yii::t('app', 'last modified time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDUserDetails()
    {
        return $this->hasMany(DUserDetail::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(DRole::className(), ['id' => 'role']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFOrders()
    {
        return $this->hasMany(FOrder::className(), ['user_id' => 'id']);
    }
}
