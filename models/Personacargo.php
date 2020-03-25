<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personacargo".
 *
 * @property int $pec_id
 * @property int $pec_persona
 * @property int $pec_cargo
 * @property int $pec_temporada
 * @property string $pec_imagen
 * @property string|null $pec_notas
 * @property string $pec_create_at
 * @property string $pec_update_at
 *
 * @property Partidoevento[] $partidoeventos
 * @property Persona $pecPersona
 * @property Cargo $pecCargo
 * @property Temporada $pecTemporada
 */
class Personacargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personacargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pec_persona', 'pec_cargo', 'pec_temporada', 'pec_imagen'], 'required'],
            [['pec_persona', 'pec_cargo', 'pec_temporada'], 'integer'],
            [['pec_create_at', 'pec_update_at'], 'safe'],
            [['pec_imagen', 'pec_notas'], 'string', 'max' => 255],
            [['pec_persona', 'pec_cargo', 'pec_temporada'], 'unique', 'targetAttribute' => ['pec_persona', 'pec_cargo', 'pec_temporada']],
            [['pec_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['pec_persona' => 'per_id']],
            [['pec_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['pec_cargo' => 'car_id']],
            [['pec_temporada'], 'exist', 'skipOnError' => true, 'targetClass' => Temporada::className(), 'targetAttribute' => ['pec_temporada' => 'tem_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pec_id' => Yii::t('app', 'Pec ID'),
            'pec_persona' => Yii::t('app', 'Pec Persona'),
            'pec_cargo' => Yii::t('app', 'Pec Cargo'),
            'pec_temporada' => Yii::t('app', 'Pec Temporada'),
            'pec_imagen' => Yii::t('app', 'Pec Imagen'),
            'pec_notas' => Yii::t('app', 'Pec Notas'),
            'pec_create_at' => Yii::t('app', 'Pec Create At'),
            'pec_update_at' => Yii::t('app', 'Pec Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidoeventos()
    {
        return $this->hasMany(Partidoevento::className(), ['pae_personacargo' => 'pec_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPecPersona()
    {
        return $this->hasOne(Persona::className(), ['per_id' => 'pec_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPecCargo()
    {
        return $this->hasOne(Cargo::className(), ['car_id' => 'pec_cargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPecTemporada()
    {
        return $this->hasOne(Temporada::className(), ['tem_id' => 'pec_temporada']);
    }
}
