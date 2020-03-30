<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ciudad;

/**
 * CiudadSearch represents the model behind the search form of `app\models\Ciudad`.
 */
class CiudadSearch extends Ciudad {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['ciu_id', 'ciu_provincia', 'ciu_codpos',], 'integer'],
            [['ciu_nombre', 'ciu_codpos', 'ciu_create_at', 'ciu_update_at', 'globalSearch'], 'safe'],
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
        
        $query = Ciudad::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['ciu_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 15]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'ciu_nombre',
                'ciu_create_at',
                'ciu_codpos',
                'ciuProvincia.pro_nombre' => [
                    'asc' => ['provincia.pro_nombre' => SORT_ASC,],
                    'desc' => ['provincia.pro_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'Province'),
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['ciuProvincia']);

        $query->orFilterWhere(['like', 'ciu_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'ciu_codpos', $this->globalSearch])
                ->orFilterWhere(['like', 'provincia.pro_nombre', $this->globalSearch]);

        return $dataProvider;
    }

}
