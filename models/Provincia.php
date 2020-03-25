<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provincia".
 *
 * @property int $pro_id
 * @property int $pro_nombre
 * @property int|null $pro_region
 * @property string $pro_create_at
 * @property string $pro_update_at
 *
 * @property Ciudad[] $ciudads
 * @property Region $proRegion
 */
class Provincia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provincia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_nombre'], 'required'],
            [['pro_nombre', 'pro_region'], 'integer'],
            [['pro_create_at', 'pro_update_at'], 'safe'],
            [['pro_nombre'], 'unique'],
            [['pro_region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['pro_region' => 'reg_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => Yii::t('app', 'Pro ID'),
            'pro_nombre' => Yii::t('app', 'Pro Nombre'),
            'pro_region' => Yii::t('app', 'Pro Region'),
            'pro_create_at' => Yii::t('app', 'Pro Create At'),
            'pro_update_at' => Yii::t('app', 'Pro Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudads()
    {
        return $this->hasMany(Ciudad::className(), ['ciu_provincia' => 'pro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProRegion()
    {
        return $this->hasOne(Region::className(), ['reg_id' => 'pro_region']);
    }
}
