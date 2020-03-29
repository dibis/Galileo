<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Provincia;

/**
 * ProvinciaSearch represents the model behind the search form of `app\models\Provincia`.
 */
class ProvinciaSearch extends Provincia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_id', 'pro_nombre', 'pro_region'], 'integer'],
            [['pro_create_at', 'pro_update_at', 'globalSearch'], 'safe'],
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
        $query = Provincia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['pro_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 18]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'pro_nombre',
                'pro_create_at',
                'proRegion.reg_nombre' => [
                    'asc' => ['region.reg_nombre' => SORT_ASC,],
                    'desc' => ['region.reg_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'Region'),
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
//            'pro_id' => $this->pro_id,
//            'pro_nombre' => $this->pro_nombre,
//            'pro_region' => $this->pro_region,
//            'pro_create_at' => $this->pro_create_at,
//            'pro_update_at' => $this->pro_update_at,
//        ]);

        $query->joinWith(['proRegion']);
        
        $query->orFilterWhere(['like', 'pro_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'region.reg_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'pro_create_at', $this->globalSearch]);
        
        
        return $dataProvider;
    }
}
