<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jornada".
 *
 * @property int $jor_id
 * @property string $jor_nombrenum
 * @property string $jor_fecha
 * @property int $jor_competicion
 * @property string $jor_create_at
 * @property string $jor_update_at
 *
 * @property Competicion $jorCompeticion
 * @property Partido[] $partidos
 */
class Jornada extends \yii\db\ActiveRecord
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jornada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jor_nombrenum', 'jor_fecha', 'jor_competicion'], 'required'],
            [['jor_fecha', 'jor_create_at', 'jor_update_at', 'globalSearch'], 'safe'],
            [['jor_competicion'], 'integer'],
            [['jor_nombrenum'], 'string', 'max' => 30],
            [['jor_nombrenum', 'jor_competicion'], 'unique', 'targetAttribute' => ['jor_nombrenum', 'jor_competicion']],
            [['jor_competicion'], 'exist', 'skipOnError' => true, 'targetClass' => Competicion::className(), 'targetAttribute' => ['jor_competicion' => 'com_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jor_id' => Yii::t('app', 'Id'),
            'jor_nombrenum' => Yii::t('app', 'Matchday'),
            'jor_fecha' => Yii::t('app', 'Date'),
            'jor_competicion' => Yii::t('app', 'Competition'),
            'jor_create_at' => Yii::t('app', 'Create At'),
            'jor_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJorCompeticion()
    {
        return $this->hasOne(Competicion::className(), ['com_id' => 'jor_competicion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidos()
    {
        return $this->hasMany(Partido::className(), ['par_jornada' => 'jor_id']);
    }
}
