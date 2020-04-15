<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "club".
 *
 * @property int $clu_id
 * @property int $clu_nombre
 * @property string|null $clu_nomcorto
 * @property int|null $clu_propio
 * @property int|null $clu_codigofex
 * @property string|null $clu_escudo
 * @property int|null $clu_ciudad
 * @property string|null $clu_direccion
 * @property string|null $clu_anofundacion
 * @property int|null $clu_desaparecido
 * @property string|null $clu_anodesaparicion
 * @property string|null $clu_datos
 * @property string|null $clu_equipacion
 * @property string|null $clu_imageequipac
 * @property string $clu_create_at
 * @property string $clu_update_at
 *
 * @property Ciudad $cluCiudad
 * @property Datosclub[] $datosclubs
 * @property Temporada[] $datTemporadas
 * @property Equipo[] $equipos
 * @property Estadioclub[] $estadioclubs
 */
class Club extends \yii\db\ActiveRecord
{
    public $globalSearch;
    public $file;
    public $file2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clu_nombre', 'clu_nomcorto'], 'required'],
            [['clu_propio', 'clu_codigofex', 'clu_ciudad', 'clu_desaparecido'], 'integer'],
            [['clu_anofundacion', 'clu_anodesaparicion', 'clu_create_at',
                'clu_update_at'], 'safe'],
            [['globalSearch', 'file', 'file2'], 'safe'],
            [['file', 'file2'], 'file', 'extensions' => 'jpg, gif, png, webp', 'maxSize' => 3145728],
            [['clu_datos'], 'string'],
            [['clu_nomcorto'], 'string', 'max' => 20],
            //[['clu_codigofex'], 'string', 'max' => 5], Esto da error con las imagenes
            [['clu_escudo', 'clu_imageequipac'], 'string', 'max' => 255],
            [['clu_direccion', 'clu_equipacion'], 'string', 'max' => 150],
            [['clu_datos'], 'string', 'max' => 1000],
            [['clu_nombre'], 'unique'],
            [['clu_ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudad::className(), 'targetAttribute' => ['clu_ciudad' => 'ciu_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'clu_id' => Yii::t('app', 'Id'),
            'clu_nombre' => Yii::t('app', 'Club'),
            'clu_nomcorto' => Yii::t('app', 'Short name'),
            'clu_propio' => Yii::t('app', 'Own'),
            'clu_codigofex' => Yii::t('app', 'Code FEX'),
            'clu_escudo' => Yii::t('app', 'Emblem'),
            'clu_ciudad' => Yii::t('app', 'City'),
            'clu_direccion' => Yii::t('app', 'Address'),
            'clu_anofundacion' => Yii::t('app', 'Foundation year'),
            'clu_desaparecido' => Yii::t('app', 'Extinct'),
            'clu_anodesaparicion' => Yii::t('app', 'Extinct year'),
            'clu_datos' => Yii::t('app', 'Dates'),
            'clu_equipacion' => Yii::t('app', 'Equipement'),
            'clu_imageequipac' => Yii::t('app', 'Equipement Image'),
            'clu_datos' => Yii::t('app', 'Notes'),
            'clu_create_at' => Yii::t('app', 'Create At'),
            'clu_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCluCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['ciu_id' => 'clu_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosclubs()
    {
        return $this->hasMany(Datosclub::className(), ['dat_club' => 'clu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatTemporadas()
    {
        return $this->hasMany(Temporada::className(), ['tem_id' => 'dat_temporada'])->viaTable('datosclub', ['dat_club' => 'clu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipo::className(), ['equ_club' => 'clu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadioclubs()
    {
        return $this->hasMany(Estadioclub::className(), ['escl_club' => 'clu_id']);
    }
}
