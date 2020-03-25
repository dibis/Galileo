<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $per_id
 * @property string $per_nombre
 * @property string $per_apellidos
 * @property int $per_genero
 * @property string|null $per_apodo
 * @property string|null $per_fechanacim
 * @property int|null $per_localidad
 * @property int|null $per_fallecido
 * @property string|null $per_imagengeneral
 * @property string|null $per_notas
 * @property string $per_create_at
 * @property string $per_update_at
 *
 * @property Homenaje[] $homenajes
 * @property Personacargo[] $personacargos
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['per_nombre', 'per_apellidos'], 'required'],
            [['per_genero', 'per_localidad', 'per_fallecido'], 'integer'],
            [['per_fechanacim', 'per_create_at', 'per_update_at'], 'safe'],
            [['per_nombre'], 'string', 'max' => 100],
            [['per_apellidos'], 'string', 'max' => 150],
            [['per_apodo'], 'string', 'max' => 40],
            [['per_imagengeneral', 'per_notas'], 'string', 'max' => 255],
            [['per_nombre', 'per_apellidos', 'per_apodo'], 'unique', 'targetAttribute' => ['per_nombre', 'per_apellidos', 'per_apodo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'per_id' => Yii::t('app', 'Per ID'),
            'per_nombre' => Yii::t('app', 'Per Nombre'),
            'per_apellidos' => Yii::t('app', 'Per Apellidos'),
            'per_genero' => Yii::t('app', 'Per Genero'),
            'per_apodo' => Yii::t('app', 'Per Apodo'),
            'per_fechanacim' => Yii::t('app', 'Per Fechanacim'),
            'per_localidad' => Yii::t('app', 'Per Localidad'),
            'per_fallecido' => Yii::t('app', 'Per Fallecido'),
            'per_imagengeneral' => Yii::t('app', 'Per Imagengeneral'),
            'per_notas' => Yii::t('app', 'Per Notas'),
            'per_create_at' => Yii::t('app', 'Per Create At'),
            'per_update_at' => Yii::t('app', 'Per Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomenajes()
    {
        return $this->hasMany(Homenaje::className(), ['hom_persona' => 'per_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonacargos()
    {
        return $this->hasMany(Personacargo::className(), ['pec_persona' => 'per_id']);
    }
}
