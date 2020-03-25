<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partido".
 *
 * @property int $par_id
 * @property int $par_jornada
 * @property int $par_equipo1
 * @property int $par_equipo2
 * @property int|null $par_resultado1
 * @property int|null $par_resultado2
 * @property string|null $par_quiniela
 * @property int|null $par_jugado
 * @property string|null $par_fecha
 * @property string|null $par_hora
 * @property int|null $par_aplazado
 * @property int|null $par_estadio
 * @property string|null $par_notas
 * @property string|null $par_cronica
 * @property int|null $par_sancion1equipo
 * @property int|null $par_sancion2equipo
 * @property string $par_create_at
 * @property string $par_update_at
 *
 * @property Jornada $parJornada
 * @property Equipocompeticion $parEquipo1
 * @property Equipocompeticion $parEquipo2
 * @property Partidoevento[] $partidoeventos
 */
class Partido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['par_jornada', 'par_equipo1', 'par_equipo2'], 'required'],
            [['par_jornada', 'par_equipo1', 'par_equipo2', 'par_resultado1', 'par_resultado2', 'par_jugado', 'par_aplazado', 'par_estadio', 'par_sancion1equipo', 'par_sancion2equipo'], 'integer'],
            [['par_fecha', 'par_hora', 'par_create_at', 'par_update_at'], 'safe'],
            [['par_cronica'], 'string'],
            [['par_quiniela'], 'string', 'max' => 1],
            [['par_notas'], 'string', 'max' => 255],
            [['par_jornada', 'par_equipo1', 'par_equipo2'], 'unique', 'targetAttribute' => ['par_jornada', 'par_equipo1', 'par_equipo2']],
            [['par_jornada'], 'exist', 'skipOnError' => true, 'targetClass' => Jornada::className(), 'targetAttribute' => ['par_jornada' => 'jor_id']],
            [['par_equipo1'], 'exist', 'skipOnError' => true, 'targetClass' => Equipocompeticion::className(), 'targetAttribute' => ['par_equipo1' => 'eqc_id']],
            [['par_equipo2'], 'exist', 'skipOnError' => true, 'targetClass' => Equipocompeticion::className(), 'targetAttribute' => ['par_equipo2' => 'eqc_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'par_id' => Yii::t('app', 'Par ID'),
            'par_jornada' => Yii::t('app', 'Par Jornada'),
            'par_equipo1' => Yii::t('app', 'Par Equipo1'),
            'par_equipo2' => Yii::t('app', 'Par Equipo2'),
            'par_resultado1' => Yii::t('app', 'Par Resultado1'),
            'par_resultado2' => Yii::t('app', 'Par Resultado2'),
            'par_quiniela' => Yii::t('app', 'Par Quiniela'),
            'par_jugado' => Yii::t('app', 'Par Jugado'),
            'par_fecha' => Yii::t('app', 'Par Fecha'),
            'par_hora' => Yii::t('app', 'Par Hora'),
            'par_aplazado' => Yii::t('app', 'Par Aplazado'),
            'par_estadio' => Yii::t('app', 'Par Estadio'),
            'par_notas' => Yii::t('app', 'Par Notas'),
            'par_cronica' => Yii::t('app', 'Par Cronica'),
            'par_sancion1equipo' => Yii::t('app', 'Par Sancion1equipo'),
            'par_sancion2equipo' => Yii::t('app', 'Par Sancion2equipo'),
            'par_create_at' => Yii::t('app', 'Par Create At'),
            'par_update_at' => Yii::t('app', 'Par Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParJornada()
    {
        return $this->hasOne(Jornada::className(), ['jor_id' => 'par_jornada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParEquipo1()
    {
        return $this->hasOne(Equipocompeticion::className(), ['eqc_id' => 'par_equipo1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParEquipo2()
    {
        return $this->hasOne(Equipocompeticion::className(), ['eqc_id' => 'par_equipo2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidoeventos()
    {
        return $this->hasMany(Partidoevento::className(), ['pae_partido' => 'par_id']);
    }
}
