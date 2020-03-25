<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoriaarticulo".
 *
 * @property int $car_id
 * @property string $car_nombre
 * @property string|null $car_descripcion
 * @property int|null $car_activa
 * @property string $car_create_at
 * @property string $car_update_at
 *
 * @property Articulo[] $articulos
 */
class Categoriaarticulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoriaarticulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_nombre'], 'required'],
            [['car_activa'], 'integer'],
            [['car_create_at', 'car_update_at'], 'safe'],
            [['car_nombre'], 'string', 'max' => 100],
            [['car_descripcion'], 'string', 'max' => 250],
            [['car_nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id' => Yii::t('app', 'Car ID'),
            'car_nombre' => Yii::t('app', 'Car Nombre'),
            'car_descripcion' => Yii::t('app', 'Car Descripcion'),
            'car_activa' => Yii::t('app', 'Car Activa'),
            'car_create_at' => Yii::t('app', 'Car Create At'),
            'car_update_at' => Yii::t('app', 'Car Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulo::className(), ['art_categoría' => 'car_id']);
    }
}
