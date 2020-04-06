<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temporada".
 *
 * @property int $tem_id
 * @property string $tem_inicio
 * @property string $tem_final
 * @property int|null $tem_activa
 * @property string $tem_create_at
 * @property string $tem_update_at
 *
 * @property Competicion[] $competicions
 * @property Datosclub[] $datosclubs
 * @property Club[] $datClubs
 * @property Estadioclub[] $estadioclubs
 * @property Estadioclub[] $estadioclubs0
 * @property Homenaje[] $homenajes
 * @property Personacargo[] $personacargos
 */
class Temporada extends \yii\db\ActiveRecord
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temporada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tem_inicio', 'tem_final'], 'required'],
            [['tem_inicio', 'tem_final', 'tem_create_at', 'tem_update_at', 'globalSearch'], 'safe'],
            [['tem_activa'], 'integer'],
            [['tem_inicio', 'tem_final'], 'integer'],
            [['tem_inicio', 'tem_final'], 'string', 'max' => 4],
            [['tem_inicio', 'tem_final'], 'unique', 'targetAttribute' => ['tem_inicio', 'tem_final']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tem_id' => Yii::t('app', 'Id'),
            'tem_inicio' => Yii::t('app', 'Start'),
            'tem_final' => Yii::t('app', 'End'),
            'tem_activa' => Yii::t('app', 'Active'),
            'tem_create_at' => Yii::t('app', 'Create At'),
            'tem_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompeticions()
    {
        return $this->hasMany(Competicion::className(), ['com_temporada' => 'tem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosclubs()
    {
        return $this->hasMany(Datosclub::className(), ['dat_temporada' => 'tem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatClubs()
    {
        return $this->hasMany(Club::className(), ['clu_id' => 'dat_club'])->viaTable('datosclub', ['dat_temporada' => 'tem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadioclubs()
    {
        return $this->hasMany(Estadioclub::className(), ['escl_temporadainicio' => 'tem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadioclubs0()
    {
        return $this->hasMany(Estadioclub::className(), ['escl_temporadafin' => 'tem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomenajes()
    {
        return $this->hasMany(Homenaje::className(), ['hom_temporada' => 'tem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonacargos()
    {
        return $this->hasMany(Personacargo::className(), ['pec_temporada' => 'tem_id']);
    }
}
