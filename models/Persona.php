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
 * @property Ciudad $perLocalidad
 */
class Persona extends \yii\db\ActiveRecord
{
    public $globalSearch;
    public $file;
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
            [['per_fechanacim', 'per_create_at', 'per_update_at', 'globalSearch', 'file'], 'safe'],
            //[['per_fechanacim'], 'date', 'format' => 'php:d-m-Y'],
            [['file'], 'file', 'extensions' => 'jpg, gif, png, webp', 'maxSize' => 3145728],
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
            'per_id' => Yii::t('app', 'Id'),
            'per_nombre' => Yii::t('app', 'Name'),
            'per_apellidos' => Yii::t('app', 'Surnames'),
            'per_genero' => Yii::t('app', 'Woman'),
            'per_apodo' => Yii::t('app', 'Nick'),
            'per_fechanacim' => Yii::t('app', 'Date of birth'),
            'per_localidad' => Yii::t('app', 'City'),
            'per_fallecido' => Yii::t('app', 'Dead'),
            'per_imagengeneral' => Yii::t('app', 'General picture'),
            'per_notas' => Yii::t('app', 'Notes'),
            'per_create_at' => Yii::t('app', 'Create At'),
            'per_update_at' => Yii::t('app', 'Update At'),
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
    
    public function getPerLocalidad()
    {
        return $this->hasOne(Ciudad::className(), ['ciu_id' => 'per_localidad']);
    }
    
}
