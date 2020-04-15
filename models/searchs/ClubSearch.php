<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Club;

/**
 * ClubSearch represents the model behind the search form of `app\models\Club`.
 */
class ClubSearch extends Club {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['clu_id', 'clu_nombre', 'clu_propio', 'clu_codigofex', 'clu_ciudad',
            'clu_desaparecido'], 'integer'],
            [['globalSearch', 'clu_nomcorto', 'clu_escudo', 'clu_direccion',
            'clu_anofundacion', 'clu_anodesaparicion', 'clu_datos', 'clu_equipacion',
            'clu_imageequipac', 'clu_create_at', 'clu_update_at'], 'safe'],
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
        $query = Club::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['clu_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'clu_escudo',
                'clu_nombre',
                'clu_nomcorto',
                'clu_imageequipac',
                'clu_desaparecido',
                'clu_propio',
                'clu_codigofex',
                'clu_direccion',
                'clu_anofundacion',
                'clu_anodesaparicion',
                'cluCiudad.ciu_nombre' => [
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
        
        $query->joinWith(['cluCiudad']);

        $query->orFilterWhere(['like', 'clu_nomcorto', $this->globalSearch])
                ->orFilterWhere(['like', 'clu_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'clu_propio', $this->globalSearch])
                ->orFilterWhere(['like', 'clu_codigofex', $this->globalSearch])
                ->orFilterWhere(['like', 'ciudad.ciu_nombre', $this->globalSearch])
                ->orFilterWhere(['like', 'clu_direccion', $this->globalSearch])
                ->orFilterWhere(['like', 'clu_anofundacion', $this->globalSearch])
                ->orFilterWhere(['like', 'clu_anodesaparicion', $this->globalSearch]);

        return $dataProvider;
    }

}
