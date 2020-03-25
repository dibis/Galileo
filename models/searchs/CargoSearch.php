<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cargo;

/**
 * CargoSearch represents the model behind the search form of `app\models\Cargo`.
 */
class CargoSearch extends Cargo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'car_nivel', 'car_area'], 'integer'],
            [['car_nombre', 'car_abreviatura', 'car_notas', 'car_create_at', 'car_update_at'], 'safe'],
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
        $query = Cargo::find();

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
            'car_id' => $this->car_id,
            'car_nivel' => $this->car_nivel,
            'car_area' => $this->car_area,
            'car_create_at' => $this->car_create_at,
            'car_update_at' => $this->car_update_at,
        ]);

        $query->andFilterWhere(['like', 'car_nombre', $this->car_nombre])
            ->andFilterWhere(['like', 'car_abreviatura', $this->car_abreviatura])
            ->andFilterWhere(['like', 'car_notas', $this->car_notas]);

        return $dataProvider;
    }
}
