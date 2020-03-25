<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Evento;

/**
 * EventoSearch represents the model behind the search form of `app\models\Evento`.
 */
class EventoSearch extends Evento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eve_id'], 'integer'],
            [['eve_nombre', 'eve_abreviatura', 'eve_imagen', 'eve_descripcion', 'eve_create_at', 'eve_update_at'], 'safe'],
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
        $query = Evento::find();

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
            'eve_id' => $this->eve_id,
            'eve_create_at' => $this->eve_create_at,
            'eve_update_at' => $this->eve_update_at,
        ]);

        $query->andFilterWhere(['like', 'eve_nombre', $this->eve_nombre])
            ->andFilterWhere(['like', 'eve_abreviatura', $this->eve_abreviatura])
            ->andFilterWhere(['like', 'eve_imagen', $this->eve_imagen])
            ->andFilterWhere(['like', 'eve_descripcion', $this->eve_descripcion]);

        return $dataProvider;
    }
}
