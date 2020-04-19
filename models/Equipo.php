<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipo".
 *
 * @property int $equ_id
 * @property int $equ_club
 * @property string $equ_nomcorto
 * @property int|null $equ_licencia
 * @property int|null $equ_propio
 * @property string|null $equ_datos
 * @property string $equ_create_at
 * @property string $equ_update_at
 *
 * @property Club $equClub
 * @property Licencia $equLicencia
 * @property Equipocompeticion[] $equipocompeticions
 * @property Competicion[] $eqcCompeticions
 */
class Equipo extends \yii\db\ActiveRecord
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equ_club', 'equ_nomcorto', 'equ_licencia'], 'required'],
            [['equ_club', 'equ_licencia', 'equ_propio'], 'integer'],
            [['equ_create_at', 'equ_update_at', 'globalSearch'], 'safe'],
            [['equ_nomcorto'], 'string', 'max' => 30],
            [['equ_datos'], 'string', 'max' => 255],
            [['equ_club', 'equ_nomcorto', 'equ_licencia'], 'unique', 'targetAttribute' => ['equ_club', 'equ_nomcorto', 'equ_licencia']],
            [['equ_club'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['equ_club' => 'clu_id']],
            [['equ_licencia'], 'exist', 'skipOnError' => true, 'targetClass' => Licencia::className(), 'targetAttribute' => ['equ_licencia' => 'li_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'equ_id' => Yii::t('app', 'Id'),
            'equ_club' => Yii::t('app', 'Club'),
            'equ_nomcorto' => Yii::t('app', 'Short name'),
            'equ_licencia' => Yii::t('app', 'License'),
            'equ_propio' => Yii::t('app', 'Own'),
            'equ_datos' => Yii::t('app', 'Notes'),
            'equ_create_at' => Yii::t('app', 'Create At'),
            'equ_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquClub()
    {
        return $this->hasOne(Club::className(), ['clu_id' => 'equ_club']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquLicencia()
    {
        return $this->hasOne(Licencia::className(), ['li_id' => 'equ_licencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipocompeticions()
    {
        return $this->hasMany(Equipocompeticion::className(), ['eqc_equipo' => 'equ_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEqcCompeticions()
    {
        return $this->hasMany(Competicion::className(), ['com_id' => 'eqc_competicion'])->viaTable('equipocompeticion', ['eqc_equipo' => 'equ_id']);
    }
}
