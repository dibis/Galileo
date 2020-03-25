<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clasificacionalt".
 *
 * @property int $cla_id
 * @property int $cla_competicion
 * @property int $cla_equipocomp
 * @property int $cla_posicion
 * @property int|null $cla_jugados
 * @property int|null $cla_victorias
 * @property int|null $cla_empates
 * @property int|null $cla_derrotas
 * @property int|null $cla_golesfavor
 * @property int|null $cla_golescontra
 * @property int|null $cla_puntos
 * @property int|null $cla_puntossancion
 * @property string|null $cla_notas
 * @property string $cla_create_at
 * @property string $cla_update_at
 *
 * @property Competicion $claCompeticion
 * @property Equipocompeticion $claEquipocomp
 */
class Clasificacionalt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clasificacionalt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cla_competicion', 'cla_equipocomp', 'cla_posicion'], 'required'],
            [['cla_competicion', 'cla_equipocomp', 'cla_posicion', 'cla_jugados', 'cla_victorias', 'cla_empates', 'cla_derrotas', 'cla_golesfavor', 'cla_golescontra', 'cla_puntos', 'cla_puntossancion'], 'integer'],
            [['cla_create_at', 'cla_update_at'], 'safe'],
            [['cla_notas'], 'string', 'max' => 150],
            [['cla_competicion', 'cla_equipocomp'], 'unique', 'targetAttribute' => ['cla_competicion', 'cla_equipocomp']],
            [['cla_competicion'], 'exist', 'skipOnError' => true, 'targetClass' => Competicion::className(), 'targetAttribute' => ['cla_competicion' => 'com_id']],
            [['cla_equipocomp'], 'exist', 'skipOnError' => true, 'targetClass' => Equipocompeticion::className(), 'targetAttribute' => ['cla_equipocomp' => 'eqc_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cla_id' => Yii::t('app', 'Cla ID'),
            'cla_competicion' => Yii::t('app', 'Cla Competicion'),
            'cla_equipocomp' => Yii::t('app', 'Cla Equipocomp'),
            'cla_posicion' => Yii::t('app', 'Cla Posicion'),
            'cla_jugados' => Yii::t('app', 'Cla Jugados'),
            'cla_victorias' => Yii::t('app', 'Cla Victorias'),
            'cla_empates' => Yii::t('app', 'Cla Empates'),
            'cla_derrotas' => Yii::t('app', 'Cla Derrotas'),
            'cla_golesfavor' => Yii::t('app', 'Cla Golesfavor'),
            'cla_golescontra' => Yii::t('app', 'Cla Golescontra'),
            'cla_puntos' => Yii::t('app', 'Cla Puntos'),
            'cla_puntossancion' => Yii::t('app', 'Cla Puntossancion'),
            'cla_notas' => Yii::t('app', 'Cla Notas'),
            'cla_create_at' => Yii::t('app', 'Cla Create At'),
            'cla_update_at' => Yii::t('app', 'Cla Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaCompeticion()
    {
        return $this->hasOne(Competicion::className(), ['com_id' => 'cla_competicion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaEquipocomp()
    {
        return $this->hasOne(Equipocompeticion::className(), ['eqc_id' => 'cla_equipocomp']);
    }
}
