<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estadio".
 *
 * @property int $est_id
 * @property string $est_nombre
 * @property string $est_nombrecorto
 * @property int|null $est_ciudad
 * @property int|null $est_aforo
 * @property string|null $est_imagen
 * @property string|null $est_datos
 * @property string $est_create_at
 * @property string $est_update_at
 *
 * @property Ciudad $estCiudad
 * @property Estadioclub[] $estadioclubs
 */
class Estadio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estadio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_nombre', 'est_nombrecorto'], 'required'],
            [['est_ciudad', 'est_aforo'], 'integer'],
            [['est_create_at', 'est_update_at'], 'safe'],
            [['est_nombre'], 'string', 'max' => 150],
            [['est_nombrecorto'], 'string', 'max' => 75],
            [['est_imagen', 'est_datos'], 'string', 'max' => 255],
            [['est_nombre', 'est_ciudad'], 'unique', 'targetAttribute' => ['est_nombre', 'est_ciudad']],
            [['est_ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudad::className(), 'targetAttribute' => ['est_ciudad' => 'ciu_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'est_id' => Yii::t('app', 'Est ID'),
            'est_nombre' => Yii::t('app', 'Est Nombre'),
            'est_nombrecorto' => Yii::t('app', 'Est Nombrecorto'),
            'est_ciudad' => Yii::t('app', 'Est Ciudad'),
            'est_aforo' => Yii::t('app', 'Est Aforo'),
            'est_imagen' => Yii::t('app', 'Est Imagen'),
            'est_datos' => Yii::t('app', 'Est Datos'),
            'est_create_at' => Yii::t('app', 'Est Create At'),
            'est_update_at' => Yii::t('app', 'Est Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['ciu_id' => 'est_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadioclubs()
    {
        return $this->hasMany(Estadioclub::className(), ['escl_estadio' => 'est_id']);
    }
}
