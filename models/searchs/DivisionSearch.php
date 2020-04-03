<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Division;

/**
 * DivisionSearch represents the model behind the search form of `app\models\Division`.
 */
class DivisionSearch extends Division {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['div_id', 'div_licencia', 'div_rango'], 'integer'],
            [['div_nombre', 'div_notas', 'div_create_at', 'div_update_at', 'globalSearch'], 'safe'],
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
        $query = Division::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['div_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'div_nombre',
                'div_create_at',
                'div_rango',
                'divLicencia.lic_nombre' => [
                    'asc' => ['licencia.lic_nombre' => SORT_ASC,],
                    'desc' => ['licencia.lic_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'License'),
                ],
            ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['divLicencia']);
        
        $query->orFilterWhere(['like', 'div_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'licencia.lic_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'div_rango', $this->globalSearch]);

        return $dataProvider;
    }

}
