<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipo;

/**
 * EquipoSearch represents the model behind the search form of `app\models\Equipo`.
 */
class EquipoSearch extends Equipo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equ_id', 'equ_club', 'equ_licencia', 'equ_propio'], 'integer'],
            [['equ_nomcorto', 'equ_datos', 'equ_create_at', 'equ_update_at', 'globalSearch'], 'safe'],
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
        $query = Equipo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['equ_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 15]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'equ_propio',
                'equ_nomcorto',
                'equClub.clu_escudo' => [
                    'asc' => ['club.clu_escudo' => SORT_ASC,],
                    'desc' => ['club.clu_escudo' => SORT_DESC],
                    'label' => \Yii::t('app', 'Emblem'),
                ],
                'equClub.clu_nombre' => [
                    'asc' => ['club.clu_nombre' => SORT_ASC,],
                    'desc' => ['club.clu_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'Club'),
                ],
                'equLicencia.lic_nombre' => [
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

        $query->joinWith(['equClub']);
        $query->joinWith(['equLicencia']);

        $query->orFilterWhere(['like', 'equ_nomcorto', $this->globalSearch])
            ->orFilterWhere(['like', 'club.clu_nombre', $this->globalSearch])
            ->orFilterWhere(['like', 'equ_propio', $this->globalSearch])
            ->orFilterWhere(['like', 'licencia.lic_nombre', $this->globalSearch]);

        return $dataProvider;
    }
}
