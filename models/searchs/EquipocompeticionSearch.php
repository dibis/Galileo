<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipocompeticion;

/**
 * EquipocompeticionSearch represents the model behind the search form of `app\models\Equipocompeticion`.
 */
class EquipocompeticionSearch extends Equipocompeticion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['eqc_id', 'eqc_equipo', 'eqc_competicion'], 'integer'],
            [['eqc_denominacion', 'eqc_notas', 'eqc_create_at', 'eqc_update_at'], 'safe'],
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
        $query = Equipocompeticion::find();

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
            'eqc_id' => $this->eqc_id,
            'eqc_equipo' => $this->eqc_equipo,
            'eqc_competicion' => $this->eqc_competicion,
            'eqc_create_at' => $this->eqc_create_at,
            'eqc_update_at' => $this->eqc_update_at,
        ]);

        $query->andFilterWhere(['like', 'eqc_denominacion', $this->eqc_denominacion])
            ->andFilterWhere(['like', 'eqc_notas', $this->eqc_notas]);

        return $dataProvider;
    }
}
