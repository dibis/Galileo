<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Region;

/**
 * RegionSearch represents the model behind the search form of `app\models\Region`.
 */
class RegionSearch extends Region {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['reg_id', 'reg_pais'], 'integer'],
            [['reg_nombre', 'reg_bandera', 'reg_create_at', 'reg_update_at', 'globalSearch'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        
        $query = Region::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['reg_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'reg_nombre',
                'reg_create_at',
                'reg_bandera',
                'regPais.pai_nombre' => [
                    'asc' => ['pais.pai_nombre' => SORT_ASC,],
                    'desc' => ['pais.pai_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'Country'),
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
//        $query->andFilterWhere([
//            'reg_id' => $this->reg_id,
//            'reg_pais' => $this->reg_pais,
//            'reg_create_at' => $this->reg_create_at,
//            'reg_update_at' => $this->reg_update_at,
//        ]);

        $query->joinWith(['regPais']);

        $query->orFilterWhere(['like', 'reg_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'pais.pai_nombre', $this->globalSearch]);

        return $dataProvider;
    }

}
