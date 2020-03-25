<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jornada;

/**
 * JornadaSearch represents the model behind the search form of `app\models\Jornada`.
 */
class JornadaSearch extends Jornada
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jor_id', 'jor_competicion'], 'integer'],
            [['jor_nombrenum', 'jor_fecha', 'jor_create_at', 'jor_update_at'], 'safe'],
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
        $query = Jornada::find();

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
            'jor_id' => $this->jor_id,
            'jor_fecha' => $this->jor_fecha,
            'jor_competicion' => $this->jor_competicion,
            'jor_create_at' => $this->jor_create_at,
            'jor_update_at' => $this->jor_update_at,
        ]);

        $query->andFilterWhere(['like', 'jor_nombrenum', $this->jor_nombrenum]);

        return $dataProvider;
    }
}
