<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Categoriaarticulo;

/**
 * CategoriaarticuloSearch represents the model behind the search form of `app\models\Categoriaarticulo`.
 */
class CategoriaarticuloSearch extends Categoriaarticulo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'car_activa'], 'integer'],
            [['car_nombre', 'car_descripcion', 'car_create_at', 'car_update_at'], 'safe'],
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
        $query = Categoriaarticulo::find();

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
            'car_activa' => $this->car_activa,
            'car_create_at' => $this->car_create_at,
            'car_update_at' => $this->car_update_at,
        ]);

        $query->andFilterWhere(['like', 'car_nombre', $this->car_nombre])
            ->andFilterWhere(['like', 'car_descripcion', $this->car_descripcion]);

        return $dataProvider;
    }
}
