<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tipocompeticion;

/**
 * TipocompeticionSearch represents the model behind the search form of `app\models\Tipocompeticion`.
 */
class TipocompeticionSearch extends Tipocompeticion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_id', 'tip_nombre', 'tip_rango'], 'integer'],
            [['tip_notas', 'tip_create_at', 'tip_update_at'], 'safe'],
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
        $query = Tipocompeticion::find();

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
            'tip_id' => $this->tip_id,
            'tip_nombre' => $this->tip_nombre,
            'tip_rango' => $this->tip_rango,
            'tip_create_at' => $this->tip_create_at,
            'tip_update_at' => $this->tip_update_at,
        ]);

        $query->andFilterWhere(['like', 'tip_notas', $this->tip_notas]);

        return $dataProvider;
    }
}
