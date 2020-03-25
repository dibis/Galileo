<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Competicion;

/**
 * CompeticionSearch represents the model behind the search form of `app\models\Competicion`.
 */
class CompeticionSearch extends Competicion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['com_id', 'com_tipocompeticion', 'com_temporada', 'com_licencia', 'com_division', 'com_numeroequipos'], 'integer'],
            [['com_nombre', 'com_grupo', 'com_imagen', 'com_notas', 'com_create_at', 'com_update_at'], 'safe'],
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
        $query = Competicion::find();

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
            'com_id' => $this->com_id,
            'com_tipocompeticion' => $this->com_tipocompeticion,
            'com_temporada' => $this->com_temporada,
            'com_licencia' => $this->com_licencia,
            'com_division' => $this->com_division,
            'com_numeroequipos' => $this->com_numeroequipos,
            'com_create_at' => $this->com_create_at,
            'com_update_at' => $this->com_update_at,
        ]);

        $query->andFilterWhere(['like', 'com_nombre', $this->com_nombre])
            ->andFilterWhere(['like', 'com_grupo', $this->com_grupo])
            ->andFilterWhere(['like', 'com_imagen', $this->com_imagen])
            ->andFilterWhere(['like', 'com_notas', $this->com_notas]);

        return $dataProvider;
    }
}
