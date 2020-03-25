<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagenarticulo".
 *
 * @property int $imar_id
 * @property int $imar_articulo
 * @property string $imar_imagen
 * @property string $imar_create_at
 * @property string $imar_update_at
 *
 * @property Articulo $imarArticulo
 */
class Imagenarticulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagenarticulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imar_articulo', 'imar_imagen'], 'required'],
            [['imar_articulo'], 'integer'],
            [['imar_create_at', 'imar_update_at'], 'safe'],
            [['imar_imagen'], 'string', 'max' => 255],
            [['imar_articulo'], 'exist', 'skipOnError' => true, 'targetClass' => Articulo::className(), 'targetAttribute' => ['imar_articulo' => 'art_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imar_id' => Yii::t('app', 'Imar ID'),
            'imar_articulo' => Yii::t('app', 'Imar Articulo'),
            'imar_imagen' => Yii::t('app', 'Imar Imagen'),
            'imar_create_at' => Yii::t('app', 'Imar Create At'),
            'imar_update_at' => Yii::t('app', 'Imar Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImarArticulo()
    {
        return $this->hasOne(Articulo::className(), ['art_id' => 'imar_articulo']);
    }
}
