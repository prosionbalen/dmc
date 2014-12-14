<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "h_contact_type".
 *
 * @property integer $id
 * @property string $type
 * @property string $validation
 * @property string $lang
 *
 * @property FContact[] $fContacts
 * @property DLanguage $lang0
 */
class HContactType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'h_contact_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'lang'], 'required'],
            [['id'], 'integer'],
            [['type'], 'string', 'max' => 255],
            [['validation'], 'string', 'max' => 128],
            [['lang'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'type' => Yii::t('app', 'type'),
            'validation' => Yii::t('app', 'validation'),
            'lang' => Yii::t('app', 'language'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFContacts()
    {
        return $this->hasMany(FContact::className(), ['type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang0()
    {
        return $this->hasOne(DLanguage::className(), ['code2' => 'lang']);
    }
}
