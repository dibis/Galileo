<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jornada;

/**
 * JornadaSearch represents the model behind the search form of `app\models\Jornada`.
 */
class JornadaSearch extends Jornada
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jor_id', 'jor_competicion'], 'integer'],
            [['jor_nombrenum', 'jor_fecha', 'jor_create_at', 'jor_update_at', 'globalSearch'], 'safe'],
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
        $query = Jornada::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['jor_create_at' => SORT_ASC]],
            'pagination' => ['defaultPageSize' => 20]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'jorCompeticion.competicioncompleta' => [
                    'asc' => ['competicion.com_temporada' => SORT_ASC,],
                    'desc' => ['competicion.com_temporada' => SORT_DESC],
                    'label' => \Yii::t('app', 'Competition'),
                ],
                'jor_fecha',
                'jor_nombrenum',
                'jor_create_at',
                'jor_update_at',
            ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['jorCompeticion']);
        
        $query->orFilterWhere(['like', 'jor_fecha', $this->globalSearch])
                ->orFilterWhere(['like', 'jor_nombrenum', $this->globalSearch])
                ->orFilterWhere(['like', 'competicion.com_division', $this->globalSearch]);

        return $dataProvider;
    }
}
