<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "d_continent".
 *
 * @property string $code2
 * @property string $name
 * @property string $lang
 *
 * @property DLanguage $lang0
 * @property DCountry[] $dCountries
 */
class DContinent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_continent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code2', 'name', 'lang'], 'required'],
            [['code2', 'lang'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 255],
            [['code2', 'name', 'lang'], 'unique', 'targetAttribute' => ['code2', 'name', 'lang'], 'message' => 'The combination of continent_id, continent_name and Language has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code2' => Yii::t('app', 'continent_id'),
            'name' => Yii::t('app', 'continent_name'),
            'lang' => Yii::t('app', 'Language'),
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
    public function getDCountries()
    {
        return $this->hasMany(DCountry::className(), ['continent_id' => 'code2']);
    }
}
