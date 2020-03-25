<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reconocimiento;

/**
 * ReconocimientoSearch represents the model behind the search form of `app\models\Reconocimiento`.
 */
class ReconocimientoSearch extends Reconocimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rec_id'], 'integer'],
            [['rec_nombre', 'rec_abreviatura', 'rec_imagen', 'rec_notas', 'rec_create_at', 'rec_update_at'], 'safe'],
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
        $query = Reconocimiento::find();

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
            'rec_id' => $this->rec_id,
            'rec_create_at' => $this->rec_create_at,
            'rec_update_at' => $this->rec_update_at,
        ]);

        $query->andFilterWhere(['like', 'rec_nombre', $this->rec_nombre])
            ->andFilterWhere(['like', 'rec_abreviatura', $this->rec_abreviatura])
            ->andFilterWhere(['like', 'rec_imagen', $this->rec_imagen])
            ->andFilterWhere(['like', 'rec_notas', $this->rec_notas]);

        return $dataProvider;
    }
}
