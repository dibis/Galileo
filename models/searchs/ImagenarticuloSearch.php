<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Imagenarticulo;

/**
 * ImagenarticuloSearch represents the model behind the search form of `app\models\Imagenarticulo`.
 */
class ImagenarticuloSearch extends Imagenarticulo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imar_id', 'imar_articulo'], 'integer'],
            [['imar_imagen', 'imar_create_at', 'imar_update_at'], 'safe'],
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
        $query = Imagenarticulo::find();

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
            'imar_id' => $this->imar_id,
            'imar_articulo' => $this->imar_articulo,
            'imar_create_at' => $this->imar_create_at,
            'imar_update_at' => $this->imar_update_at,
        ]);

        $query->andFilterWhere(['like', 'imar_imagen', $this->imar_imagen]);

        return $dataProvider;
    }
}
