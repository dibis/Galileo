<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articulo".
 *
 * @property int $art_id
 * @property string $art_titulo
 * @property int|null $art_categoría
 * @property int|null $art_articulocorto
 * @property int|null $art_destacado
 * @property string $art_contenido
 * @property int $art_publicado
 * @property string|null $art_iniciopubli
 * @property string $art_finpubli
 * @property int|null $art_user
 * @property string $art_create_at
 * @property string $art_update_at
 *
 * @property Categoriaarticulo $artCategoría
 * @property Imagenarticulo[] $imagenarticulos
 */
class Articulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_titulo', 'art_contenido', 'art_publicado', 'art_finpubli'], 'required'],
            [['art_categoría', 'art_articulocorto', 'art_destacado', 'art_publicado', 'art_user'], 'integer'],
            [['art_contenido'], 'string'],
            [['art_iniciopubli', 'art_finpubli', 'art_create_at', 'art_update_at'], 'safe'],
            [['art_titulo'], 'string', 'max' => 200],
            [['art_categoría'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriaarticulo::className(), 'targetAttribute' => ['art_categoría' => 'car_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'art_id' => Yii::t('app', 'Art ID'),
            'art_titulo' => Yii::t('app', 'Art Titulo'),
            'art_categoría' => Yii::t('app', 'Art Categoría'),
            'art_articulocorto' => Yii::t('app', 'Art Articulocorto'),
            'art_destacado' => Yii::t('app', 'Art Destacado'),
            'art_contenido' => Yii::t('app', 'Art Contenido'),
            'art_publicado' => Yii::t('app', 'Art Publicado'),
            'art_iniciopubli' => Yii::t('app', 'Art Iniciopubli'),
            'art_finpubli' => Yii::t('app', 'Art Finpubli'),
            'art_user' => Yii::t('app', 'Art User'),
            'art_create_at' => Yii::t('app', 'Art Create At'),
            'art_update_at' => Yii::t('app', 'Art Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtCategoría()
    {
        return $this->hasOne(Categoriaarticulo::className(), ['car_id' => 'art_categoría']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagenarticulos()
    {
        return $this->hasMany(Imagenarticulo::className(), ['imar_articulo' => 'art_id']);
    }
}
