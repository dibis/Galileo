<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipocompeticion".
 *
 * @property int $tip_id
 * @property int $tip_nombre
 * @property int $tip_rango
 * @property string|null $tip_notas
 * @property string $tip_create_at
 * @property string $tip_update_at
 *
 * @property Competicion[] $competicions
 */
class Tipocompeticion extends \yii\db\ActiveRecord
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipocompeticion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_nombre', 'tip_rango'], 'required'],
            [['tip_rango'], 'integer'],
            [['tip_nombre'], 'string', 'max' => 75],    
            [['tip_create_at', 'tip_update_at', 'globalSearch'], 'safe'],
            [['tip_notas'], 'string', 'max' => 255],
            [['tip_nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tip_id' => Yii::t('app', 'Id'),
            'tip_nombre' => Yii::t('app', 'Type of competition'),
            'tip_rango' => Yii::t('app', 'Rank'),
            'tip_notas' => Yii::t('app', 'Notes'),
            'tip_create_at' => Yii::t('app', 'Create At'),
            'tip_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompeticions()
    {
        return $this->hasMany(Competicion::className(), ['com_tipocompeticion' => 'tip_id']);
    }
}
