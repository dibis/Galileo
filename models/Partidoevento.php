<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partidoevento".
 *
 * @property int $pae_id
 * @property int $pae_partido
 * @property int $pae_personacargo
 * @property int $pae_evento
 * @property int|null $pae_minuto
 * @property int $pae_cantidad
 * @property int|null $pae_especial
 * @property string $pae_create_at
 * @property string $pae_update_at
 *
 * @property Partido $paePartido
 * @property Personacargo $paePersonacargo
 * @property Evento $paeEvento
 */
class Partidoevento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partidoevento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pae_partido', 'pae_personacargo', 'pae_evento', 'pae_cantidad'], 'required'],
            [['pae_partido', 'pae_personacargo', 'pae_evento', 'pae_minuto', 'pae_cantidad', 'pae_especial'], 'integer'],
            [['pae_create_at', 'pae_update_at'], 'safe'],
            [['pae_partido'], 'exist', 'skipOnError' => true, 'targetClass' => Partido::className(), 'targetAttribute' => ['pae_partido' => 'par_id']],
            [['pae_personacargo'], 'exist', 'skipOnError' => true, 'targetClass' => Personacargo::className(), 'targetAttribute' => ['pae_personacargo' => 'pec_id']],
            [['pae_evento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['pae_evento' => 'eve_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pae_id' => Yii::t('app', 'Pae ID'),
            'pae_partido' => Yii::t('app', 'Pae Partido'),
            'pae_personacargo' => Yii::t('app', 'Pae Personacargo'),
            'pae_evento' => Yii::t('app', 'Pae Evento'),
            'pae_minuto' => Yii::t('app', 'Pae Minuto'),
            'pae_cantidad' => Yii::t('app', 'Pae Cantidad'),
            'pae_especial' => Yii::t('app', 'Pae Especial'),
            'pae_create_at' => Yii::t('app', 'Pae Create At'),
            'pae_update_at' => Yii::t('app', 'Pae Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaePartido()
    {
        return $this->hasOne(Partido::className(), ['par_id' => 'pae_partido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaePersonacargo()
    {
        return $this->hasOne(Personacargo::className(), ['pec_id' => 'pae_personacargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaeEvento()
    {
        return $this->hasOne(Evento::className(), ['eve_id' => 'pae_evento']);
    }
}
