<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estadio;

/**
 * EstadioSearch represents the model behind the search form of `app\models\Estadio`.
 */
class EstadioSearch extends Estadio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_id', 'est_ciudad', 'est_aforo'], 'integer'],
            [['est_nombre', 'est_nombrecorto', 'est_imagen', 'est_datos', 'est_create_at', 'est_update_at'], 'safe'],
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
        $query = Estadio::find();

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
            'est_id' => $this->est_id,
            'est_ciudad' => $this->est_ciudad,
            'est_aforo' => $this->est_aforo,
            'est_create_at' => $this->est_create_at,
            'est_update_at' => $this->est_update_at,
        ]);

        $query->andFilterWhere(['like', 'est_nombre', $this->est_nombre])
            ->andFilterWhere(['like', 'est_nombrecorto', $this->est_nombrecorto])
            ->andFilterWhere(['like', 'est_imagen', $this->est_imagen])
            ->andFilterWhere(['like', 'est_datos', $this->est_datos]);

        return $dataProvider;
    }
}
