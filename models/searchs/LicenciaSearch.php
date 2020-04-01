<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Licencia;

/**
 * LicenciaSearch represents the model behind the search form of `app\models\Licencia`.
 */
class LicenciaSearch extends Licencia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['li_id', 'lic_rango'], 'integer'],
            [['lic_nombre', 'lic_letra', 'lic_notas', 'lic_create_at', 'lic_update_at', 'globalSearch'], 'safe'],
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
        $query = Licencia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['lic_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'lic_nombre', $this->globalSearch])
            ->orFilterWhere(['like', 'lic_letra', $this->globalSearch])
            ->orFilterWhere(['like', 'lic_rango', $this->globalSearch]);

        return $dataProvider;
    }
}
