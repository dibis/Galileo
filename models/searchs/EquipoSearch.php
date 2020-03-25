<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipo;

/**
 * EquipoSearch represents the model behind the search form of `app\models\Equipo`.
 */
class EquipoSearch extends Equipo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equ_id', 'equ_club', 'equ_licencia', 'equ_propio'], 'integer'],
            [['equ_nomcorto', 'equ_datos', 'equ_create_at', 'equ_update_at'], 'safe'],
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
        $query = Equipo::find();

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
            'equ_id' => $this->equ_id,
            'equ_club' => $this->equ_club,
            'equ_licencia' => $this->equ_licencia,
            'equ_propio' => $this->equ_propio,
            'equ_create_at' => $this->equ_create_at,
            'equ_update_at' => $this->equ_update_at,
        ]);

        $query->andFilterWhere(['like', 'equ_nomcorto', $this->equ_nomcorto])
            ->andFilterWhere(['like', 'equ_datos', $this->equ_datos]);

        return $dataProvider;
    }
}
