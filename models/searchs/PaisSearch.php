<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pais;

/**
 * PaisSearch represents the model behind the search form of `app\models\Pais`.
 */
class PaisSearch extends Pais
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pai_id'], 'integer'],
            [['pai_nombre', 'pai_bandera', 'pai_create_at', 'pai_update_at'], 'safe'],
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
        $query = Pais::find();

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
            'pai_id' => $this->pai_id,
            'pai_create_at' => $this->pai_create_at,
            'pai_update_at' => $this->pai_update_at,
        ]);

        $query->andFilterWhere(['like', 'pai_nombre', $this->pai_nombre])
            ->andFilterWhere(['like', 'pai_bandera', $this->pai_bandera]);

        return $dataProvider;
    }
}
