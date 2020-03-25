<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipocompeticion".
 *
 * @property int $eqc_id
 * @property int $eqc_equipo
 * @property int $eqc_competicion
 * @property string|null $eqc_denominacion
 * @property string|null $eqc_notas
 * @property string $eqc_create_at
 * @property string $eqc_update_at
 *
 * @property Clasificacionalt[] $clasificacionalts
 * @property Competicion[] $claCompeticions
 * @property Equipo $eqcEquipo
 * @property Competicion $eqcCompeticion
 * @property Partido[] $partidos
 * @property Partido[] $partidos0
 */
class Equipocompeticion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipocompeticion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eqc_id', 'eqc_equipo', 'eqc_competicion'], 'required'],
            [['eqc_id', 'eqc_equipo', 'eqc_competicion'], 'integer'],
            [['eqc_create_at', 'eqc_update_at'], 'safe'],
            [['eqc_denominacion'], 'string', 'max' => 100],
            [['eqc_notas'], 'string', 'max' => 255],
            [['eqc_equipo', 'eqc_competicion'], 'unique', 'targetAttribute' => ['eqc_equipo', 'eqc_competicion']],
            [['eqc_id'], 'unique'],
            [['eqc_equipo'], 'exist', 'skipOnError' => true, 'targetClass' => Equipo::className(), 'targetAttribute' => ['eqc_equipo' => 'equ_id']],
            [['eqc_competicion'], 'exist', 'skipOnError' => true, 'targetClass' => Competicion::className(), 'targetAttribute' => ['eqc_competicion' => 'com_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'eqc_id' => Yii::t('app', 'Eqc ID'),
            'eqc_equipo' => Yii::t('app', 'Eqc Equipo'),
            'eqc_competicion' => Yii::t('app', 'Eqc Competicion'),
            'eqc_denominacion' => Yii::t('app', 'Eqc Denominacion'),
            'eqc_notas' => Yii::t('app', 'Eqc Notas'),
            'eqc_create_at' => Yii::t('app', 'Eqc Create At'),
            'eqc_update_at' => Yii::t('app', 'Eqc Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasificacionalts()
    {
        return $this->hasMany(Clasificacionalt::className(), ['cla_equipocomp' => 'eqc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaCompeticions()
    {
        return $this->hasMany(Competicion::className(), ['com_id' => 'cla_competicion'])->viaTable('clasificacionalt', ['cla_equipocomp' => 'eqc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEqcEquipo()
    {
        return $this->hasOne(Equipo::className(), ['equ_id' => 'eqc_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEqcCompeticion()
    {
        return $this->hasOne(Competicion::className(), ['com_id' => 'eqc_competicion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos()
    {
        return $this->hasMany(Partido::className(), ['par_equipo1' => 'eqc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos0()
    {
        return $this->hasMany(Partido::className(), ['par_equipo2' => 'eqc_id']);
    }
}
