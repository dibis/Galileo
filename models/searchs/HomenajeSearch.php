<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Homenaje;

/**
 * HomenajeSearch represents the model behind the search form of `app\models\Homenaje`.
 */
class HomenajeSearch extends Homenaje
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hom_id', 'hom_persona', 'hom_reconocimiento', 'hom_temporada'], 'integer'],
            [['hom_fecha', 'hom_notas', 'hom_create_at', 'hom_update_at', 'globalSearch'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Homenaje::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['hom_create_at' => SORT_ASC]],
            'pagination' => ['defaultPageSize' => 15]
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'homPersona.personacompleta' => [
                    'asc' => ['persona.per_nombre' => SORT_ASC, 'persona.per_apellidos' => SORT_ASC,],
                    'desc' => ['persona.per_nombre' => SORT_DESC, 'persona.per_apellidos' => SORT_DESC,],
                    'label' => \Yii::t('app', 'Person'),
                ],
                'homReconocimiento.rec_nombre' => [
                    'asc' => ['reconocimiento.rec_nombre' => SORT_ASC,],
                    'desc' => ['reconocimiento.rec_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'Acknowledgment'),
                ],
                'homTemporada.temporadacompleta' => [
                    'asc' => ['temporada.tem_inicio' => SORT_ASC,],
                    'desc' => ['temporada.tem_inicio' => SORT_DESC],
                    'label' => \Yii::t('app', 'Season'),
                ],
                'hom_fecha',
                'hom_notas',
                'hom_create_at',
                'hom_update_at',
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['homPersona']);
        $query->joinWith(['homReconocimiento']);
        $query->joinWith(['homTemporada']);
        
        $query->orFilterWhere(['like', 'hom_fecha', $this->globalSearch])
                ->orFilterWhere(['like', 'temporada.tem_inicio', $this->globalSearch])
                ->orFilterWhere(['like', 'temporada.tem_final', $this->globalSearch])
                ->orFilterWhere(['like', 'reconocimiento.rec_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'persona.per_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'persona.per_apellidos', $this->globalSearch]);

        return $dataProvider;
    }
}
