<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "division".
 *
 * @property int $div_id
 * @property string $div_nombre
 * @property int $div_licencia
 * @property int|null $div_rango
 * @property string $div_notas
 * @property string $div_create_at
 * @property string $div_update_at
 *
 * @property Competicion[] $competicions
 * @property Licencia $divLicencia
 */
class Division extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'division';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['div_nombre', 'div_licencia', 'div_notas'], 'required'],
            [['div_licencia', 'div_rango'], 'integer'],
            [['div_create_at', 'div_update_at'], 'safe'],
            [['div_nombre'], 'string', 'max' => 75],
            [['div_notas'], 'string', 'max' => 255],
            [['div_nombre', 'div_licencia'], 'unique', 'targetAttribute' => ['div_nombre', 'div_licencia']],
            [['div_licencia'], 'exist', 'skipOnError' => true, 'targetClass' => Licencia::className(), 'targetAttribute' => ['div_licencia' => 'li_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'div_id' => Yii::t('app', 'Div ID'),
            'div_nombre' => Yii::t('app', 'Div Nombre'),
            'div_licencia' => Yii::t('app', 'Div Licencia'),
            'div_rango' => Yii::t('app', 'Div Rango'),
            'div_notas' => Yii::t('app', 'Div Notas'),
            'div_create_at' => Yii::t('app', 'Div Create At'),
            'div_update_at' => Yii::t('app', 'Div Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompeticions()
    {
        return $this->hasMany(Competicion::className(), ['com_division' => 'div_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivLicencia()
    {
        return $this->hasOne(Licencia::className(), ['li_id' => 'div_licencia']);
    }
}
