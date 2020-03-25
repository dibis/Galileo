<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ciudad;

/**
 * CiudadSearch represents the model behind the search form of `app\models\Ciudad`.
 */
class CiudadSearch extends Ciudad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ciu_id', 'ciu_provincia'], 'integer'],
            [['ciu_nombre', 'ciu_codpos', 'ciu_create_at', 'ciu_update_at'], 'safe'],
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
        $query = Ciudad::find();

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
            'ciu_id' => $this->ciu_id,
            'ciu_provincia' => $this->ciu_provincia,
            'ciu_create_at' => $this->ciu_create_at,
            'ciu_update_at' => $this->ciu_update_at,
        ]);

        $query->andFilterWhere(['like', 'ciu_nombre', $this->ciu_nombre])
            ->andFilterWhere(['like', 'ciu_codpos', $this->ciu_codpos]);

        return $dataProvider;
    }
}
