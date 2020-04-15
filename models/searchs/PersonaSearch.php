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
            [['per_nombre', 'per_apellidos', 'per_apodo', 'per_fechanacim',
                'per_imagengeneral', 'per_notas', 'per_create_at', 'per_update_at', 'globalSearch'], 'safe'],
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
            'sort' => ['defaultOrder' => ['per_create_at' => SORT_ASC]],
            'pagination' => ['defaultPageSize' => 15]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'per_nombre',
                'per_apellidos',
                'per_apodo',
                'per_fechanacim',
                'per_fallecido',
                'per_genero',
                'per_imagengeneral',
                'per_create_at',
                'perLocalidad.ciu_nombre' => [
                    'asc' => ['ciudad.ciu_nombre' => SORT_ASC,],
                    'desc' => ['ciudad.ciu_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'City'),
                ],
            ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith(['perLocalidad']);

        $query->orFilterWhere(['like', 'per_nombre', $this->globalSearch])
            ->orFilterWhere(['like', 'per_apellidos', $this->globalSearch])
            ->orFilterWhere(['like', 'per_apodo', $this->globalSearch])
            ->orFilterWhere(['like', 'ciudad.ciu_nombre', $this->globalSearch])
            ->orFilterWhere(['like', 'per_fechanacim', $this->globalSearch]);

        return $dataProvider;
    }
}
