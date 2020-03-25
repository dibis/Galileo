<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Club;

/**
 * ClubSearch represents the model behind the search form of `app\models\Club`.
 */
class ClubSearch extends Club
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clu_id', 'clu_nombre', 'clu_propio', 'clu_codigofex', 'clu_ciudad', 'clu_desaparecido'], 'integer'],
            [['clu_nomcorto', 'clu_escudo', 'clu_direccion', 'clu_anofundacion', 'clu_anodesaparicion', 'clu_datos', 'clu_equipacion', 'clu_imageequipac', 'clu_create_at', 'clu_update_at'], 'safe'],
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
        $query = Club::find();

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
            'clu_id' => $this->clu_id,
            'clu_nombre' => $this->clu_nombre,
            'clu_propio' => $this->clu_propio,
            'clu_codigofex' => $this->clu_codigofex,
            'clu_ciudad' => $this->clu_ciudad,
            'clu_anofundacion' => $this->clu_anofundacion,
            'clu_desaparecido' => $this->clu_desaparecido,
            'clu_anodesaparicion' => $this->clu_anodesaparicion,
            'clu_create_at' => $this->clu_create_at,
            'clu_update_at' => $this->clu_update_at,
        ]);

        $query->andFilterWhere(['like', 'clu_nomcorto', $this->clu_nomcorto])
            ->andFilterWhere(['like', 'clu_escudo', $this->clu_escudo])
            ->andFilterWhere(['like', 'clu_direccion', $this->clu_direccion])
            ->andFilterWhere(['like', 'clu_datos', $this->clu_datos])
            ->andFilterWhere(['like', 'clu_equipacion', $this->clu_equipacion])
            ->andFilterWhere(['like', 'clu_imageequipac', $this->clu_imageequipac]);

        return $dataProvider;
    }
}
