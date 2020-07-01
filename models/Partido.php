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
    
    public $globalSearch;
    
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
            [['par_jornada', 'par_equipo1', 'par_equipo2', 'par_resultado1', 
                'par_resultado2', 'par_jugado', 'par_aplazado', 'par_estadio',
                'par_sancion1equipo', 'par_sancion2equipo'], 'integer'],
            [['par_fecha', 'par_hora', 'par_create_at', 'par_update_at', 'globalSearch'], 'safe'],
            [['par_cronica'], 'string'],
            [['par_quiniela'], 'string', 'max' => 1],
            [['par_notas'], 'string', 'max' => 255],
            [['par_jornada', 'par_equipo1', 'par_equipo2'], 'unique',
                'targetAttribute' => ['par_jornada', 'par_equipo1', 'par_equipo2']],
            [['par_jornada'], 'exist', 'skipOnError' => true,
                'targetClass' => Jornada::className(), 'targetAttribute' => ['par_jornada' => 'jor_id']],
            [['par_equipo1'], 'exist', 'skipOnError' => true,
                'targetClass' => Equipocompeticion::className(), 'targetAttribute' => ['par_equipo1' => 'eqc_id']],
            [['par_equipo2'], 'exist', 'skipOnError' => true,
                'targetClass' => Equipocompeticion::className(), 'targetAttribute' => ['par_equipo2' => 'eqc_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'par_id' => Yii::t('app', 'Id'),
            'par_jornada' => Yii::t('app', 'Matchday'),
            'par_equipo1' => Yii::t('app', 'Local team'),
            'par_equipo2' => Yii::t('app', 'Visiting team'),
            'par_resultado1' => Yii::t('app', 'Score'),
            'par_resultado2' => Yii::t('app', 'Score'),
            'par_quiniela' => Yii::t('app', 'Pool'),
            'par_jugado' => Yii::t('app', 'Played'),
            'par_fecha' => Yii::t('app', 'Date'),
            'par_hora' => Yii::t('app', 'Hour'),
            'par_aplazado' => Yii::t('app', 'Postponed'),
            'par_estadio' => Yii::t('app', 'Stadium'),
            'par_notas' => Yii::t('app', 'Notes'),
            'par_cronica' => Yii::t('app', 'Feature'),
            'par_sancion1equipo' => Yii::t('app', 'Sanction Team 1'),
            'par_sancion2equipo' => Yii::t('app', 'Sanction Team 2'),
            'par_create_at' => Yii::t('app', 'Create At'),
            'par_update_at' => Yii::t('app', 'Update At'),
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
