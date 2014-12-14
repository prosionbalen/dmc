<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "f_contact".
 *
 * @property integer $user_id
 * @property integer $type_id
 * @property string $intlcode
 * @property string $areacode
 * @property string $detail
 * @property string $created_at
 *
 * @property HContactType $type
 * @property DUserDetail $user
 */
class FContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'f_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type_id'], 'required'],
            [['user_id', 'type_id'], 'integer'],
            [['created_at'], 'safe'],
            [['intlcode', 'areacode'], 'string', 'max' => 16],
            [['detail'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'user_id'),
            'type_id' => Yii::t('app', 'type'),
            'intlcode' => Yii::t('app', 'intlcode'),
            'areacode' => Yii::t('app', 'areacode'),
            'detail' => Yii::t('app', 'contact detail'),
            'created_at' => Yii::t('app', 'last modified time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(HContactType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(DUserDetail::className(), ['id' => 'user_id']);
    }
}
