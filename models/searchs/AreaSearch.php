<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Area;

/**
 * AreaSearch represents the model behind the search form of `app\models\Area`.
 */
class AreaSearch extends Area
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['are_id', 'are_nivel'], 'integer'],
            [['are_nombre', 'are_abreviatura', 'are_imagen', 'are_notas', 'are_create_at', 'are_update_at'], 'safe'],
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
        $query = Area::find();

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
            'are_id' => $this->are_id,
            'are_nivel' => $this->are_nivel,
            'are_create_at' => $this->are_create_at,
            'are_update_at' => $this->are_update_at,
        ]);

        $query->andFilterWhere(['like', 'are_nombre', $this->are_nombre])
            ->andFilterWhere(['like', 'are_abreviatura', $this->are_abreviatura])
            ->andFilterWhere(['like', 'are_imagen', $this->are_imagen])
            ->andFilterWhere(['like', 'are_notas', $this->are_notas]);

        return $dataProvider;
    }
}
