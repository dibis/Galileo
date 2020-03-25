<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Division;

/**
 * DivisionSearch represents the model behind the search form of `app\models\Division`.
 */
class DivisionSearch extends Division
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['div_id', 'div_licencia', 'div_rango'], 'integer'],
            [['div_nombre', 'div_notas', 'div_create_at', 'div_update_at'], 'safe'],
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
        $query = Division::find();

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
            'div_id' => $this->div_id,
            'div_licencia' => $this->div_licencia,
            'div_rango' => $this->div_rango,
            'div_create_at' => $this->div_create_at,
            'div_update_at' => $this->div_update_at,
        ]);

        $query->andFilterWhere(['like', 'div_nombre', $this->div_nombre])
            ->andFilterWhere(['like', 'div_notas', $this->div_notas]);

        return $dataProvider;
    }
}
