<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciudad".
 *
 * @property int $ciu_id
 * @property string $ciu_nombre
 * @property int|null $ciu_provincia
 * @property string|null $ciu_codpos
 * @property string $ciu_create_at
 * @property string $ciu_update_at
 *
 * @property Provincia $ciuProvincia
 * @property Club[] $clubs
 * @property Estadio[] $estadios
 */
class Ciudad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ciudad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ciu_nombre'], 'required'],
            [['ciu_provincia'], 'integer'],
            [['ciu_create_at', 'ciu_update_at'], 'safe'],
            [['ciu_nombre'], 'string', 'max' => 75],
            [['ciu_codpos'], 'string', 'max' => 5],
            [['ciu_nombre'], 'unique'],
            [['ciu_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincia::className(), 'targetAttribute' => ['ciu_provincia' => 'pro_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ciu_id' => Yii::t('app', 'Ciu ID'),
            'ciu_nombre' => Yii::t('app', 'Ciu Nombre'),
            'ciu_provincia' => Yii::t('app', 'Ciu Provincia'),
            'ciu_codpos' => Yii::t('app', 'Ciu Codpos'),
            'ciu_create_at' => Yii::t('app', 'Ciu Create At'),
            'ciu_update_at' => Yii::t('app', 'Ciu Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiuProvincia()
    {
        return $this->hasOne(Provincia::className(), ['pro_id' => 'ciu_provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClubs()
    {
        return $this->hasMany(Club::className(), ['clu_ciudad' => 'ciu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadios()
    {
        return $this->hasMany(Estadio::className(), ['est_ciudad' => 'ciu_id']);
    }
}
