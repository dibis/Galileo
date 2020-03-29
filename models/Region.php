<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $reg_id
 * @property string $reg_nombre
 * @property int $reg_pais
 * @property string|null $reg_bandera
 * @property string $reg_create_at
 * @property string $reg_update_at
 *
 * @property Provincia[] $provincias
 * @property Pais $regPais
 */
class Region extends \yii\db\ActiveRecord
{
    public $globalSearch;
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_nombre', 'reg_pais'], 'required'],
            [['reg_pais'], 'integer'],
            [['reg_create_at', 'reg_update_at', 'globalSearch',], 'safe'],
            [['reg_nombre'], 'string', 'max' => 75],
            [['reg_bandera'], 'string', 'max' => 255],
            [['reg_nombre'], 'unique'],
            [['file'], 'file', 'extensions' => 'jpg, gif, png, webp', 'maxSize' => 3145728],
            [['reg_pais'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['reg_pais' => 'pai_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reg_id' => Yii::t('app', 'Id'),
            'reg_nombre' => Yii::t('app', 'Region'),
            'reg_pais' => Yii::t('app', 'Country'),
            'reg_bandera' => Yii::t('app', 'Flag'),
            'reg_create_at' => Yii::t('app', 'Create At'),
            'reg_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincias()
    {
        return $this->hasMany(Provincia::className(), ['pro_region' => 'reg_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegPais()
    {
        return $this->hasOne(Pais::className(), ['pai_id' => 'reg_pais']);
    }
}
