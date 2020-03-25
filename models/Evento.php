<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property int $eve_id
 * @property string $eve_nombre
 * @property string $eve_abreviatura
 * @property string|null $eve_imagen
 * @property string|null $eve_descripcion
 * @property string $eve_create_at
 * @property string $eve_update_at
 *
 * @property Partidoevento[] $partidoeventos
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eve_nombre', 'eve_abreviatura'], 'required'],
            [['eve_create_at', 'eve_update_at'], 'safe'],
            [['eve_nombre'], 'string', 'max' => 50],
            [['eve_abreviatura'], 'string', 'max' => 3],
            [['eve_imagen', 'eve_descripcion'], 'string', 'max' => 255],
            [['eve_nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'eve_id' => Yii::t('app', 'Eve ID'),
            'eve_nombre' => Yii::t('app', 'Eve Nombre'),
            'eve_abreviatura' => Yii::t('app', 'Eve Abreviatura'),
            'eve_imagen' => Yii::t('app', 'Eve Imagen'),
            'eve_descripcion' => Yii::t('app', 'Eve Descripcion'),
            'eve_create_at' => Yii::t('app', 'Eve Create At'),
            'eve_update_at' => Yii::t('app', 'Eve Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartidoeventos()
    {
        return $this->hasMany(Partidoevento::className(), ['pae_evento' => 'eve_id']);
    }
}
