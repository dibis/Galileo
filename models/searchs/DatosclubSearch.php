<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datosclub;

/**
 * DatosclubSearch represents the model behind the search form of `app\models\Datosclub`.
 */
class DatosclubSearch extends Datosclub
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dat_id', 'dat_club', 'dat_temporada', 'dat_socios', 'dat_presupuesto'], 'integer'],
            [['dat_camiseta', 'dat_camiseta2', 'dat_patrocinador', 'dat_imagenpatro', 'dat_notas', 'dat_create_at', 'dat_update_at'], 'safe'],
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
        $query = Datosclub::find();

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
            'dat_id' => $this->dat_id,
            'dat_club' => $this->dat_club,
            'dat_temporada' => $this->dat_temporada,
            'dat_socios' => $this->dat_socios,
            'dat_presupuesto' => $this->dat_presupuesto,
            'dat_create_at' => $this->dat_create_at,
            'dat_update_at' => $this->dat_update_at,
        ]);

        $query->andFilterWhere(['like', 'dat_camiseta', $this->dat_camiseta])
            ->andFilterWhere(['like', 'dat_camiseta2', $this->dat_camiseta2])
            ->andFilterWhere(['like', 'dat_patrocinador', $this->dat_patrocinador])
            ->andFilterWhere(['like', 'dat_imagenpatro', $this->dat_imagenpatro])
            ->andFilterWhere(['like', 'dat_notas', $this->dat_notas]);

        return $dataProvider;
    }
}
