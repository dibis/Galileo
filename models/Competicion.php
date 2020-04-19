<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competicion".
 *
 * @property int $com_id
 * @property string $com_nombre
 * @property int $com_tipocompeticion
 * @property int $com_temporada
 * @property int $com_licencia
 * @property string|null $com_grupo
 * @property int $com_division
 * @property int $com_numeroequipos
 * @property string|null $com_imagen
 * @property string|null $com_notas
 * @property string $com_create_at
 * @property string $com_update_at
 *
 * @property Clasificacionalt[] $clasificacionalts
 * @property Equipocompeticion[] $claEquipocomps
 * @property Licencia $comLicencia
 * @property Tipocompeticion $comTipocompeticion
 * @property Division $comDivision
 * @property Temporada $comTemporada
 * @property Equipocompeticion[] $equipocompeticions
 * @property Equipo[] $eqcEquipos
 * @property Jornada[] $jornadas
 */
class Competicion extends \yii\db\ActiveRecord
{
    public $globalSearch;
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competicion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['com_tipocompeticion', 'com_temporada', 'com_licencia',
                'com_division', 'com_numeroequipos', 'com_grupo'], 'required'],
            [['com_tipocompeticion', 'com_temporada', 'com_licencia', 'com_division',
                'com_numeroequipos'], 'integer'],
            [['com_create_at', 'com_update_at', 'globalSearch', 'file'], 'safe'],
            [['com_grupo'], 'string', 'max' => 40],
            [['file'], 'file', 'extensions' => 'jpg, gif, png, webp', 'maxSize' => 3145728],
            [['com_imagen', 'com_notas'], 'string', 'max' => 255],
            [['com_tipocompeticion', 'com_temporada', 'com_licencia', 'com_grupo',
                'com_division'], 'unique', 'targetAttribute' => ['com_tipocompeticion',
                    'com_temporada', 'com_licencia', 'com_grupo', 'com_division']],
            [['com_licencia'], 'exist', 'skipOnError' => true, 'targetClass' => Licencia::className(),
                'targetAttribute' => ['com_licencia' => 'li_id']],
            [['com_tipocompeticion'], 'exist', 'skipOnError' => true, 
                'targetClass' => Tipocompeticion::className(), 'targetAttribute' => ['com_tipocompeticion' => 'tip_id']],
            [['com_division'], 'exist', 'skipOnError' => true,
                'targetClass' => Division::className(), 'targetAttribute' => ['com_division' => 'div_id']],
            [['com_temporada'], 'exist', 'skipOnError' => true, 
                'targetClass' => Temporada::className(), 'targetAttribute' => ['com_temporada' => 'tem_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'com_id' => Yii::t('app', 'Id'),
            'com_tipocompeticion' => Yii::t('app', 'Type of competition'),
            'com_temporada' => Yii::t('app', 'Season'),
            'com_licencia' => Yii::t('app', 'License'),
            'com_grupo' => Yii::t('app', 'Group'),
            'com_division' => Yii::t('app', 'Division'),
            'com_numeroequipos' => Yii::t('app', 'Nº teams'),
            'com_imagen' => Yii::t('app', 'Image'),
            'com_notas' => Yii::t('app', 'Notes'),
            'com_create_at' => Yii::t('app', 'Create At'),
            'com_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasificacionalts()
    {
        return $this->hasMany(Clasificacionalt::className(), ['cla_competicion' => 'com_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaEquipocomps()
    {
        return $this->hasMany(Equipocompeticion::className(), ['eqc_id' => 'cla_equipocomp'])->viaTable('clasificacionalt', ['cla_competicion' => 'com_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComLicencia()
    {
        return $this->hasOne(Licencia::className(), ['li_id' => 'com_licencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComTipocompeticion()
    {
        return $this->hasOne(Tipocompeticion::className(), ['tip_id' => 'com_tipocompeticion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComDivision()
    {
        return $this->hasOne(Division::className(), ['div_id' => 'com_division']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComTemporada()
    {
        return $this->hasOne(Temporada::className(), ['tem_id' => 'com_temporada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipocompeticions()
    {
        return $this->hasMany(Equipocompeticion::className(), ['eqc_competicion' => 'com_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEqcEquipos()
    {
        return $this->hasMany(Equipo::className(), ['equ_id' => 'eqc_equipo'])->viaTable('equipocompeticion', ['eqc_competicion' => 'com_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJornadas()
    {
        return $this->hasMany(Jornada::className(), ['jor_competicion' => 'com_id']);
    }
}
