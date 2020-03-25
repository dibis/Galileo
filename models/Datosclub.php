<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datosclub".
 *
 * @property int $dat_id
 * @property int $dat_club
 * @property int $dat_temporada
 * @property int|null $dat_socios
 * @property int|null $dat_presupuesto
 * @property string|null $dat_camiseta
 * @property string|null $dat_camiseta2
 * @property string|null $dat_patrocinador
 * @property string|null $dat_imagenpatro
 * @property string|null $dat_notas
 * @property string $dat_create_at
 * @property string $dat_update_at
 *
 * @property Club $datClub
 * @property Temporada $datTemporada
 */
class Datosclub extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datosclub';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dat_club', 'dat_temporada'], 'required'],
            [['dat_club', 'dat_temporada', 'dat_socios', 'dat_presupuesto'], 'integer'],
            [['dat_create_at', 'dat_update_at'], 'safe'],
            [['dat_camiseta', 'dat_camiseta2', 'dat_imagenpatro', 'dat_notas'], 'string', 'max' => 255],
            [['dat_patrocinador'], 'string', 'max' => 150],
            [['dat_club', 'dat_temporada'], 'unique', 'targetAttribute' => ['dat_club', 'dat_temporada']],
            [['dat_club'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['dat_club' => 'clu_id']],
            [['dat_temporada'], 'exist', 'skipOnError' => true, 'targetClass' => Temporada::className(), 'targetAttribute' => ['dat_temporada' => 'tem_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dat_id' => Yii::t('app', 'Dat ID'),
            'dat_club' => Yii::t('app', 'Dat Club'),
            'dat_temporada' => Yii::t('app', 'Dat Temporada'),
            'dat_socios' => Yii::t('app', 'Dat Socios'),
            'dat_presupuesto' => Yii::t('app', 'Dat Presupuesto'),
            'dat_camiseta' => Yii::t('app', 'Dat Camiseta'),
            'dat_camiseta2' => Yii::t('app', 'Dat Camiseta2'),
            'dat_patrocinador' => Yii::t('app', 'Dat Patrocinador'),
            'dat_imagenpatro' => Yii::t('app', 'Dat Imagenpatro'),
            'dat_notas' => Yii::t('app', 'Dat Notas'),
            'dat_create_at' => Yii::t('app', 'Dat Create At'),
            'dat_update_at' => Yii::t('app', 'Dat Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatClub()
    {
        return $this->hasOne(Club::className(), ['clu_id' => 'dat_club']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatTemporada()
    {
        return $this->hasOne(Temporada::className(), ['tem_id' => 'dat_temporada']);
    }
}
