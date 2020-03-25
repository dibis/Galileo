<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $are_id
 * @property string $are_nombre
 * @property string $are_abreviatura
 * @property int|null $are_nivel
 * @property string|null $are_imagen
 * @property string|null $are_notas
 * @property string $are_create_at
 * @property string $are_update_at
 *
 * @property Cargo $cargo
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['are_nombre', 'are_abreviatura'], 'required'],
            [['are_nivel'], 'integer'],
            [['are_create_at', 'are_update_at'], 'safe'],
            [['are_nombre'], 'string', 'max' => 60],
            [['are_abreviatura'], 'string', 'max' => 3],
            [['are_imagen', 'are_notas'], 'string', 'max' => 255],
            [['are_nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'are_id' => Yii::t('app', 'Are ID'),
            'are_nombre' => Yii::t('app', 'Are Nombre'),
            'are_abreviatura' => Yii::t('app', 'Are Abreviatura'),
            'are_nivel' => Yii::t('app', 'Are Nivel'),
            'are_imagen' => Yii::t('app', 'Are Imagen'),
            'are_notas' => Yii::t('app', 'Are Notas'),
            'are_create_at' => Yii::t('app', 'Are Create At'),
            'are_update_at' => Yii::t('app', 'Are Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['car_area' => 'are_id']);
    }
}
