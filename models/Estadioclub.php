<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estadioclub".
 *
 * @property int $escl_id
 * @property int $escl_estadio
 * @property int $escl_club
 * @property int|null $escl_actual
 * @property int|null $escl_temporadainicio
 * @property int|null $escl_temporadafin
 * @property string|null $escl_notas
 * @property string $escl_create_at
 * @property string $escl_update_at
 *
 * @property Club $esclClub
 * @property Estadio $esclEstadio
 * @property Temporada $esclTemporadainicio
 * @property Temporada $esclTemporadafin
 */
class Estadioclub extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estadioclub';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['escl_estadio', 'escl_club'], 'required'],
            [['escl_estadio', 'escl_club', 'escl_actual', 'escl_temporadainicio', 'escl_temporadafin'], 'integer'],
            [['escl_create_at', 'escl_update_at'], 'safe'],
            [['escl_notas'], 'string', 'max' => 255],
            [['escl_estadio', 'escl_club', 'escl_actual'], 'unique', 'targetAttribute' => ['escl_estadio', 'escl_club', 'escl_actual']],
            [['escl_club'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['escl_club' => 'clu_id']],
            [['escl_estadio'], 'exist', 'skipOnError' => true, 'targetClass' => Estadio::className(), 'targetAttribute' => ['escl_estadio' => 'est_id']],
            [['escl_temporadainicio'], 'exist', 'skipOnError' => true, 'targetClass' => Temporada::className(), 'targetAttribute' => ['escl_temporadainicio' => 'tem_id']],
            [['escl_temporadafin'], 'exist', 'skipOnError' => true, 'targetClass' => Temporada::className(), 'targetAttribute' => ['escl_temporadafin' => 'tem_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'escl_id' => Yii::t('app', 'Escl ID'),
            'escl_estadio' => Yii::t('app', 'Escl Estadio'),
            'escl_club' => Yii::t('app', 'Escl Club'),
            'escl_actual' => Yii::t('app', 'Escl Actual'),
            'escl_temporadainicio' => Yii::t('app', 'Escl Temporadainicio'),
            'escl_temporadafin' => Yii::t('app', 'Escl Temporadafin'),
            'escl_notas' => Yii::t('app', 'Escl Notas'),
            'escl_create_at' => Yii::t('app', 'Escl Create At'),
            'escl_update_at' => Yii::t('app', 'Escl Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEsclClub()
    {
        return $this->hasOne(Club::className(), ['clu_id' => 'escl_club']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEsclEstadio()
    {
        return $this->hasOne(Estadio::className(), ['est_id' => 'escl_estadio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEsclTemporadainicio()
    {
        return $this->hasOne(Temporada::className(), ['tem_id' => 'escl_temporadainicio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEsclTemporadafin()
    {
        return $this->hasOne(Temporada::className(), ['tem_id' => 'escl_temporadafin']);
    }
}
