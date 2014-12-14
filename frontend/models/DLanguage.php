<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "d_language".
 *
 * @property integer $id
 * @property string $LanguageFamily
 * @property string $language
 * @property string $NativeName
 * @property string $code2
 * @property string $code3T
 * @property string $code3B
 *
 * @property DCategory[] $dCategories
 * @property DCity[] $dCities
 * @property DContinent[] $dContinents
 * @property DCountry[] $dCountries
 * @property DIngredients[] $dIngredients
 * @property DRecipe[] $dRecipes
 * @property DRole[] $dRoles
 * @property DState[] $dStates
 * @property DUserDetail[] $dUserDetails
 * @property FProcedure[] $fProcedures
 * @property HContactType[] $hContactTypes
 * @property HOrderStatus[] $hOrderStatuses
 * @property HOrderType[] $hOrderTypes
 */
class DLanguage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code2', 'code3T', 'code3B'], 'required'],
            [['LanguageFamily', 'language'], 'string', 'max' => 256],
            [['NativeName'], 'string', 'max' => 512],
            [['code2'], 'string', 'max' => 2],
            [['code3T', 'code3B'], 'string', 'max' => 3],
            [['code3T'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'LanguageFamily' => Yii::t('app', 'Language Family'),
            'language' => Yii::t('app', 'Language'),
            'NativeName' => Yii::t('app', 'Native Name'),
            'code2' => Yii::t('app', '639-1'),
            'code3T' => Yii::t('app', '639-2/T'),
            'code3B' => Yii::t('app', '639-2/B'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDCategories()
    {
        return $this->hasMany(DCategory::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDCities()
    {
        return $this->hasMany(DCity::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDContinents()
    {
        return $this->hasMany(DContinent::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDCountries()
    {
        return $this->hasMany(DCountry::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDIngredients()
    {
        return $this->hasMany(DIngredients::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDRecipes()
    {
        return $this->hasMany(DRecipe::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDRoles()
    {
        return $this->hasMany(DRole::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDStates()
    {
        return $this->hasMany(DState::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDUserDetails()
    {
        return $this->hasMany(DUserDetail::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFProcedures()
    {
        return $this->hasMany(FProcedure::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHContactTypes()
    {
        return $this->hasMany(HContactType::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHOrderStatuses()
    {
        return $this->hasMany(HOrderStatus::className(), ['lang' => 'code2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHOrderTypes()
    {
        return $this->hasMany(HOrderType::className(), ['lang' => 'code2']);
    }
}
