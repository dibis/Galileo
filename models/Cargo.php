<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property int $car_id
 * @property string $car_nombre
 * @property string|null $car_abreviatura
 * @property int $car_nivel
 * @property int $car_area
 * @property string|null $car_notas
 * @property string $car_create_at
 * @property string $car_update_at
 *
 * @property Area $carArea
 * @property Personacargo[] $personacargos
 */
class Cargo extends \yii\db\ActiveRecord
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_nombre', 'car_nivel', 'car_area'], 'required'],
            [['car_nivel', 'car_area'], 'integer'],
            [['car_create_at', 'car_update_at', 'globalSearch'], 'safe'],
            [['car_nombre'], 'string', 'max' => 75],
            [['car_nivel'], 'string', 'max' => 2],
            [['car_abreviatura'], 'string', 'max' => 3],
            [['car_notas'], 'string', 'max' => 255],
            [['car_area', 'car_nombre'], 'unique'],
            [['car_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['car_area' => 'are_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id' => Yii::t('app', 'Id'),
            'car_nombre' => Yii::t('app', 'Position'),
            'car_abreviatura' => Yii::t('app', 'Abbreviation'),
            'car_nivel' => Yii::t('app', 'Level'),
            'car_area' => Yii::t('app', 'Area'),
            'car_notas' => Yii::t('app', 'Notes'),
            'car_create_at' => Yii::t('app', 'Create At'),
            'car_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarArea()
    {
        return $this->hasOne(Area::className(), ['are_id' => 'car_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonacargos()
    {
        return $this->hasMany(Personacargo::className(), ['pec_cargo' => 'car_id']);
    }
}
