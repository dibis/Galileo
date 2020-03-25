<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Partidoevento;

/**
 * PartidoeventoSearch represents the model behind the search form of `app\models\Partidoevento`.
 */
class PartidoeventoSearch extends Partidoevento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pae_id', 'pae_partido', 'pae_personacargo', 'pae_evento', 'pae_minuto', 'pae_cantidad', 'pae_especial'], 'integer'],
            [['pae_create_at', 'pae_update_at'], 'safe'],
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
        $query = Partidoevento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pae_id' => $this->pae_id,
            'pae_partido' => $this->pae_partido,
            'pae_personacargo' => $this->pae_personacargo,
            'pae_evento' => $this->pae_evento,
            'pae_minuto' => $this->pae_minuto,
            'pae_cantidad' => $this->pae_cantidad,
            'pae_especial' => $this->pae_especial,
            'pae_create_at' => $this->pae_create_at,
            'pae_update_at' => $this->pae_update_at,
        ]);

        return $dataProvider;
    }
}
