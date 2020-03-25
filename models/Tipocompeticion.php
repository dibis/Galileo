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
            [['tip_nombre', 'tip_rango'], 'integer'],
            [['tip_create_at', 'tip_update_at'], 'safe'],
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
            'tip_id' => Yii::t('app', 'Tip ID'),
            'tip_nombre' => Yii::t('app', 'Tip Nombre'),
            'tip_rango' => Yii::t('app', 'Tip Rango'),
            'tip_notas' => Yii::t('app', 'Tip Notas'),
            'tip_create_at' => Yii::t('app', 'Tip Create At'),
            'tip_update_at' => Yii::t('app', 'Tip Update At'),
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
