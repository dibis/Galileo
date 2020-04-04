<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estadio;

/**
 * EstadioSearch represents the model behind the search form of `app\models\Estadio`.
 */
class EstadioSearch extends Estadio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_id', 'est_ciudad', 'est_aforo'], 'integer'],
            [['est_nombre', 'est_nombrecorto', 'est_imagen', 'est_datos', 
                'est_create_at', 'est_update_at', 'globalSearch'], 'safe'],
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
        $query = Estadio::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['est_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'est_nombre',
                'est_create_at',
                'est_imagen',
                'est_aforo',
                'est_nombrecorto',
                'estCiudad.ciu_nombre' => [
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
        
        $query->joinWith(['estCiudad']);

        $query->orFilterWhere(['like', 'est_nombre', $this->globalSearch])
            ->orFilterWhere(['like', 'est_nombrecorto', $this->globalSearch])
            ->orFilterWhere(['like', 'ciudad.ciu_nombre', $this->globalSearch])
            ->orFilterWhere(['like', 'est_aforo', $this->globalSearch]);

        return $dataProvider;
    }
}
