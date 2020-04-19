<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Competicion;

/**
 * CompeticionSearch represents the model behind the search form of `app\models\Competicion`.
 */
class CompeticionSearch extends Competicion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['com_id', 'com_tipocompeticion', 'com_temporada', 'com_licencia',
                'com_division', 'com_numeroequipos'], 'integer'],
            [['com_grupo', 'com_imagen', 'com_notas', 'com_create_at',
                'com_update_at', 'globalSearch'], 'safe'],
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
        $query = Competicion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['com_create_at' => SORT_ASC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'com_numeroequipos',
                'com_grupo',
                'comLicencia.lic_nombre' => [
                    'asc' => ['licencia.lic_nombre' => SORT_ASC,],
                    'desc' => ['licencia.lic_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'License'),
                ],
                'com_temporada' => [
                    'asc' => ['temporada.tem_inicio' => SORT_ASC,],
                    'desc' => ['temporada.tem_inicio' => SORT_DESC],
                    'label' => \Yii::t('app', 'Season'),
                ],
                'comTipocompeticion.tip_nombre' => [
                    'asc' => ['tipocompeticion.tip_nombre' => SORT_ASC,],
                    'desc' => ['tipocompeticion.tip_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'Type of competition'),
                ],
                'comDivision.div_nombre' => [
                    'asc' => ['division.div_nombre' => SORT_ASC,],
                    'desc' => ['division.div_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'Division'),
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['comLicencia']);
        $query->joinWith(['comTemporada']);
        $query->joinWith(['comTipocompeticion']);
        $query->joinWith(['comDivision']);
        
        $query->orFilterWhere(['like', 'com_numeroequipos', $this->globalSearch])
            ->orFilterWhere(['like', 'com_grupo', $this->globalSearch])
            ->orFilterWhere(['like', 'licencia.lic_nombre', $this->globalSearch])
            ->orFilterWhere(['like', 'temporada.tem_inicio', $this->globalSearch])
            ->orFilterWhere(['like', 'temporada.tem_final', $this->globalSearch])
            ->orFilterWhere(['like', 'tipocompeticion.tip_nombre', $this->globalSearch])
            ->orFilterWhere(['like', 'division.div_nombre', $this->globalSearch]);

        return $dataProvider;
    }
}
