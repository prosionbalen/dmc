<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "d_role".
 *
 * @property integer $id
 * @property string $role
 * @property string $lang
 * @property integer $access_id
 *
 * @property DLanguage $lang0
 * @property DUsers[] $dUsers
 */
class DRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role', 'lang', 'access_id'], 'required'],
            [['id', 'access_id'], 'integer'],
            [['role'], 'string', 'max' => 127],
            [['lang'], 'string', 'max' => 2],
            [['role', 'access_id'], 'unique', 'targetAttribute' => ['role', 'access_id'], 'message' => 'The combination of role and authoization id has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'role' => Yii::t('app', 'role'),
            'lang' => Yii::t('app', 'language'),
            'access_id' => Yii::t('app', 'authoization id'),
        ];
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
    public function getDUsers()
    {
        return $this->hasMany(DUsers::className(), ['role' => 'id']);
    }
}
