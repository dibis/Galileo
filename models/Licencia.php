<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "licencia".
 *
 * @property int $li_id
 * @property string $lic_nombre
 * @property string $lic_letra
 * @property int $lic_rango
 * @property string $lic_notas
 * @property string $lic_create_at
 * @property string $lic_update_at
 *
 * @property Competicion[] $competicions
 * @property Division[] $divisions
 * @property Equipo[] $equipos
 */
class Licencia extends \yii\db\ActiveRecord
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lic_nombre', 'lic_letra'], 'required'],
            [['lic_rango'], 'integer'],
            [['lic_create_at', 'lic_update_at', 'globalSearch'], 'safe'],
            [['lic_nombre'], 'string', 'max' => 60],
            [['lic_letra'], 'string', 'max' => 3],
            //[['lic_rango'], 'string', 'max' => 2],
            [['lic_notas'], 'string', 'max' => 255],
            [['lic_nombre'], 'unique'],
            [['lic_letra'], 'unique'],
            [['lic_rango'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'li_id' => Yii::t('app', 'Id'),
            'lic_nombre' => Yii::t('app', 'License'),
            'lic_letra' => Yii::t('app', 'Word'),
            'lic_rango' => Yii::t('app', 'Rank'),
            'lic_notas' => Yii::t('app', 'Notes'),
            'lic_create_at' => Yii::t('app', 'Create At'),
            'lic_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompeticions()
    {
        return $this->hasMany(Competicion::className(), ['com_licencia' => 'li_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisions()
    {
        return $this->hasMany(Division::className(), ['div_licencia' => 'li_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipo::className(), ['equ_licencia' => 'li_id']);
    }
}
