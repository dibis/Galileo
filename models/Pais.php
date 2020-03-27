<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pais".
 *
 * @property int $pai_id
 * @property string $pai_nombre
 * @property string|null $pai_bandera
 * @property string $pai_create_at
 * @property string $pai_update_at
 *
 * @property Region[] $regions
 */
class Pais extends \yii\db\ActiveRecord
{
    public $globalSearch;
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pai_nombre'], 'required'],
            [['pai_create_at', 'pai_update_at'], 'safe'],
            [['globalSearch', 'file'], 'safe'],
            [['file'], 'file', 'extensions' => 'jpg, gif, png'],
            [['pai_nombre'], 'string', 'max' => 75],
            [['pai_bandera'], 'string', 'max' => 255],
            [['pai_nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pai_id' => Yii::t('app', 'Id'),
            'pai_nombre' => Yii::t('app', 'Name'),
            'pai_bandera' => Yii::t('app', 'Flag'),
            'pai_create_at' => Yii::t('app', 'Create At'),
            'pai_update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegions()
    {
        return $this->hasMany(Region::className(), ['reg_pais' => 'pai_id']);
    }
}
