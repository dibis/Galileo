<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form of `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['per_id', 'per_genero', 'per_localidad', 'per_fallecido'], 'integer'],
            [['per_nombre', 'per_apellidos', 'per_apodo', 'per_fechanacim', 'per_imagengeneral', 'per_notas', 'per_create_at', 'per_update_at'], 'safe'],
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
        $query = Persona::find();

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
            'per_id' => $this->per_id,
            'per_genero' => $this->per_genero,
            'per_fechanacim' => $this->per_fechanacim,
            'per_localidad' => $this->per_localidad,
            'per_fallecido' => $this->per_fallecido,
            'per_create_at' => $this->per_create_at,
            'per_update_at' => $this->per_update_at,
        ]);

        $query->andFilterWhere(['like', 'per_nombre', $this->per_nombre])
            ->andFilterWhere(['like', 'per_apellidos', $this->per_apellidos])
            ->andFilterWhere(['like', 'per_apodo', $this->per_apodo])
            ->andFilterWhere(['like', 'per_imagengeneral', $this->per_imagengeneral])
            ->andFilterWhere(['like', 'per_notas', $this->per_notas]);

        return $dataProvider;
    }
}
