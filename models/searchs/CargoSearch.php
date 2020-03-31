<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cargo;

/**
 * CargoSearch represents the model behind the search form of `app\models\Cargo`.
 */
class CargoSearch extends Cargo {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['car_id', 'car_nivel', 'car_area'], 'integer'],
            [['car_nombre', 'car_abreviatura', 'car_notas', 'car_create_at', 'car_update_at', 'globalSearch'], 'safe'],
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
        $query = Cargo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['car_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 15]
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'car_nombre',
                'car_create_at',
                'car_nivel',
                'car_abreviatura',
                'carArea.are_nombre' => [
                    'asc' => ['area.are_nombre' => SORT_ASC,],
                    'desc' => ['area.are_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'Area'),
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith(['carArea']);

        $query->orFilterWhere(['like', 'car_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'car_nivel', $this->globalSearch])
                ->orFilterWhere(['like', 'area.are_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'car_abreviatura', $this->globalSearch]);

        return $dataProvider;
    }

}
