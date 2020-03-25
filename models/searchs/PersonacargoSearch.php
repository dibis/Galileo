<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personacargo;

/**
 * PersonacargoSearch represents the model behind the search form of `app\models\Personacargo`.
 */
class PersonacargoSearch extends Personacargo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pec_id', 'pec_persona', 'pec_cargo', 'pec_temporada'], 'integer'],
            [['pec_imagen', 'pec_notas', 'pec_create_at', 'pec_update_at'], 'safe'],
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
        $query = Personacargo::find();

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
            'pec_id' => $this->pec_id,
            'pec_persona' => $this->pec_persona,
            'pec_cargo' => $this->pec_cargo,
            'pec_temporada' => $this->pec_temporada,
            'pec_create_at' => $this->pec_create_at,
            'pec_update_at' => $this->pec_update_at,
        ]);

        $query->andFilterWhere(['like', 'pec_imagen', $this->pec_imagen])
            ->andFilterWhere(['like', 'pec_notas', $this->pec_notas]);

        return $dataProvider;
    }
}
