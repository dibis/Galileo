<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estadioclub;

/**
 * EstadioclubSearch represents the model behind the search form of `app\models\Estadioclub`.
 */
class EstadioclubSearch extends Estadioclub
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['escl_id', 'escl_estadio', 'escl_club', 'escl_actual', 'escl_temporadainicio', 'escl_temporadafin'], 'integer'],
            [['escl_notas', 'escl_create_at', 'escl_update_at'], 'safe'],
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
        $query = Estadioclub::find();

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
            'escl_id' => $this->escl_id,
            'escl_estadio' => $this->escl_estadio,
            'escl_club' => $this->escl_club,
            'escl_actual' => $this->escl_actual,
            'escl_temporadainicio' => $this->escl_temporadainicio,
            'escl_temporadafin' => $this->escl_temporadafin,
            'escl_create_at' => $this->escl_create_at,
            'escl_update_at' => $this->escl_update_at,
        ]);

        $query->andFilterWhere(['like', 'escl_notas', $this->escl_notas]);

        return $dataProvider;
    }
}
