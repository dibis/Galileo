<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clasificacionalt;

/**
 * ClasificacionaltSearch represents the model behind the search form of `app\models\Clasificacionalt`.
 */
class ClasificacionaltSearch extends Clasificacionalt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cla_id', 'cla_competicion', 'cla_equipocomp', 'cla_posicion', 'cla_jugados', 'cla_victorias', 'cla_empates', 'cla_derrotas', 'cla_golesfavor', 'cla_golescontra', 'cla_puntos', 'cla_puntossancion'], 'integer'],
            [['cla_notas', 'cla_create_at', 'cla_update_at'], 'safe'],
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
        $query = Clasificacionalt::find();

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
            'cla_id' => $this->cla_id,
            'cla_competicion' => $this->cla_competicion,
            'cla_equipocomp' => $this->cla_equipocomp,
            'cla_posicion' => $this->cla_posicion,
            'cla_jugados' => $this->cla_jugados,
            'cla_victorias' => $this->cla_victorias,
            'cla_empates' => $this->cla_empates,
            'cla_derrotas' => $this->cla_derrotas,
            'cla_golesfavor' => $this->cla_golesfavor,
            'cla_golescontra' => $this->cla_golescontra,
            'cla_puntos' => $this->cla_puntos,
            'cla_puntossancion' => $this->cla_puntossancion,
            'cla_create_at' => $this->cla_create_at,
            'cla_update_at' => $this->cla_update_at,
        ]);

        $query->andFilterWhere(['like', 'cla_notas', $this->cla_notas]);

        return $dataProvider;
    }
}
