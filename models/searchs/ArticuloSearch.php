<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Articulo;

/**
 * ArticuloSearch represents the model behind the search form of `app\models\Articulo`.
 */
class ArticuloSearch extends Articulo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_id', 'art_categoría', 'art_articulocorto', 'art_destacado', 'art_publicado', 'art_user'], 'integer'],
            [['art_titulo', 'art_contenido', 'art_iniciopubli', 'art_finpubli', 'art_create_at', 'art_update_at'], 'safe'],
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
        $query = Articulo::find();

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
            'art_id' => $this->art_id,
            'art_categoría' => $this->art_categoría,
            'art_articulocorto' => $this->art_articulocorto,
            'art_destacado' => $this->art_destacado,
            'art_publicado' => $this->art_publicado,
            'art_iniciopubli' => $this->art_iniciopubli,
            'art_finpubli' => $this->art_finpubli,
            'art_user' => $this->art_user,
            'art_create_at' => $this->art_create_at,
            'art_update_at' => $this->art_update_at,
        ]);

        $query->andFilterWhere(['like', 'art_titulo', $this->art_titulo])
            ->andFilterWhere(['like', 'art_contenido', $this->art_contenido]);

        return $dataProvider;
    }
}
