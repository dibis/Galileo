<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reconocimiento".
 *
 * @property int $rec_id
 * @property string $rec_nombre
 * @property string|null $rec_abreviatura
 * @property string|null $rec_imagen
 * @property string|null $rec_notas
 * @property string $rec_create_at
 * @property string $rec_update_at
 *
 * @property Homenaje[] $homenajes
 */
class Reconocimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reconocimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rec_nombre'], 'required'],
            [['rec_create_at', 'rec_update_at'], 'safe'],
            [['rec_nombre'], 'string', 'max' => 75],
            [['rec_abreviatura'], 'string', 'max' => 3],
            [['rec_imagen', 'rec_notas'], 'string', 'max' => 255],
            [['rec_nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rec_id' => Yii::t('app', 'Rec ID'),
            'rec_nombre' => Yii::t('app', 'Rec Nombre'),
            'rec_abreviatura' => Yii::t('app', 'Rec Abreviatura'),
            'rec_imagen' => Yii::t('app', 'Rec Imagen'),
            'rec_notas' => Yii::t('app', 'Rec Notas'),
            'rec_create_at' => Yii::t('app', 'Rec Create At'),
            'rec_update_at' => Yii::t('app', 'Rec Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomenajes()
    {
        return $this->hasMany(Homenaje::className(), ['hom_reconocimiento' => 'rec_id']);
    }
}
