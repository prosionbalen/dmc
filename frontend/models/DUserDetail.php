<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "d_user_detail".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $lang
 * @property integer $company_id
 * @property integer $position_id
 * @property integer $address_id
 * @property string $dob
 * @property string $anniversary
 *
 * @property DUsers $user
 * @property DAddress $address
 * @property DLanguage $lang0
 * @property FContact[] $fContacts
 */
class DUserDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_user_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'lastname'], 'required'],
            [['user_id', 'company_id', 'position_id', 'address_id'], 'integer'],
            [['dob', 'anniversary'], 'safe'],
            [['firstname', 'lastname'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'user id'),
            'firstname' => Yii::t('app', 'firstname'),
            'lastname' => Yii::t('app', 'lastname'),
            'lang' => Yii::t('app', 'language'),
            'company_id' => Yii::t('app', 'company'),
            'position_id' => Yii::t('app', 'position'),
            'address_id' => Yii::t('app', 'address id'),
            'dob' => Yii::t('app', 'date of birth'),
            'anniversary' => Yii::t('app', 'anniversary'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(DUsers::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(DAddress::className(), ['id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang0()
    {
        return $this->hasOne(DLanguage::className(), ['code2' => 'lang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFContacts()
    {
        return $this->hasMany(FContact::className(), ['user_id' => 'id']);
    }
}
