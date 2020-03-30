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
    public $globalSearch;
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
            [['pro_nombre'], 'string', 'max' => 75],
            [['pro_region'], 'integer'],
            [['pro_create_at', 'pro_update_at', 'globalSearch'], 'safe'],
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
            'pro_id' => Yii::t('app', 'Id'),
            'pro_nombre' => Yii::t('app', 'Province'),
            'pro_region' => Yii::t('app', 'Region'),
            'pro_create_at' => Yii::t('app', 'Create At'),
            'pro_update_at' => Yii::t('app', 'Update At'),
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
