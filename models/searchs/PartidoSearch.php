<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Partido;

/**
 * PartidoSearch represents the model behind the search form of `app\models\Partido`.
 */
class PartidoSearch extends Partido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['par_id', 'par_jornada', 'par_equipo1', 'par_equipo2', 'par_resultado1', 'par_resultado2', 'par_jugado', 'par_aplazado', 'par_estadio', 'par_sancion1equipo', 'par_sancion2equipo'], 'integer'],
            [['par_quiniela', 'par_fecha', 'par_hora', 'par_notas', 'par_cronica', 'par_create_at', 'par_update_at'], 'safe'],
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
        $query = Partido::find();

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
            'par_id' => $this->par_id,
            'par_jornada' => $this->par_jornada,
            'par_equipo1' => $this->par_equipo1,
            'par_equipo2' => $this->par_equipo2,
            'par_resultado1' => $this->par_resultado1,
            'par_resultado2' => $this->par_resultado2,
            'par_jugado' => $this->par_jugado,
            'par_fecha' => $this->par_fecha,
            'par_hora' => $this->par_hora,
            'par_aplazado' => $this->par_aplazado,
            'par_estadio' => $this->par_estadio,
            'par_sancion1equipo' => $this->par_sancion1equipo,
            'par_sancion2equipo' => $this->par_sancion2equipo,
            'par_create_at' => $this->par_create_at,
            'par_update_at' => $this->par_update_at,
        ]);

        $query->andFilterWhere(['like', 'par_quiniela', $this->par_quiniela])
            ->andFilterWhere(['like', 'par_notas', $this->par_notas])
            ->andFilterWhere(['like', 'par_cronica', $this->par_cronica]);

        return $dataProvider;
    }
}
