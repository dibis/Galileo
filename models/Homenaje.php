<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "homenaje".
 *
 * @property int $hom_id
 * @property int $hom_persona
 * @property int $hom_reconocimiento
 * @property int $hom_temporada
 * @property string|null $hom_fecha
 * @property string|null $hom_notas
 * @property string $hom_create_at
 * @property string $hom_update_at
 *
 * @property Reconocimiento $homReconocimiento
 * @property Persona $homPersona
 * @property Temporada $homTemporada
 */
class Homenaje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'homenaje';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hom_persona', 'hom_reconocimiento', 'hom_temporada'], 'required'],
            [['hom_persona', 'hom_reconocimiento', 'hom_temporada'], 'integer'],
            [['hom_fecha', 'hom_create_at', 'hom_update_at'], 'safe'],
            [['hom_notas'], 'string', 'max' => 255],
            [['hom_persona', 'hom_reconocimiento', 'hom_temporada'], 'unique', 'targetAttribute' => ['hom_persona', 'hom_reconocimiento', 'hom_temporada']],
            [['hom_reconocimiento'], 'exist', 'skipOnError' => true, 'targetClass' => Reconocimiento::className(), 'targetAttribute' => ['hom_reconocimiento' => 'rec_id']],
            [['hom_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['hom_persona' => 'per_id']],
            [['hom_temporada'], 'exist', 'skipOnError' => true, 'targetClass' => Temporada::className(), 'targetAttribute' => ['hom_temporada' => 'tem_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hom_id' => Yii::t('app', 'Hom ID'),
            'hom_persona' => Yii::t('app', 'Hom Persona'),
            'hom_reconocimiento' => Yii::t('app', 'Hom Reconocimiento'),
            'hom_temporada' => Yii::t('app', 'Hom Temporada'),
            'hom_fecha' => Yii::t('app', 'Hom Fecha'),
            'hom_notas' => Yii::t('app', 'Hom Notas'),
            'hom_create_at' => Yii::t('app', 'Hom Create At'),
            'hom_update_at' => Yii::t('app', 'Hom Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomReconocimiento()
    {
        return $this->hasOne(Reconocimiento::className(), ['rec_id' => 'hom_reconocimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomPersona()
    {
        return $this->hasOne(Persona::className(), ['per_id' => 'hom_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomTemporada()
    {
        return $this->hasOne(Temporada::className(), ['tem_id' => 'hom_temporada']);
    }
}
