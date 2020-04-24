<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datosclub;

/**
 * DatosclubSearch represents the model behind the search form of `app\models\Datosclub`.
 */
class DatosclubSearch extends Datosclub
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dat_id', 'dat_club', 'dat_temporada', 'dat_socios', 'dat_presupuesto'], 'integer'],
            [['dat_camiseta', 'dat_camiseta2', 'dat_patrocinador', 'dat_imagenpatro',
                'dat_notas', 'dat_create_at', 'dat_update_at', 'globalSearch'], 'safe'],
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
        $query = Datosclub::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['dat_create_at' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'dat_socios',
                'dat_presupuesto',
                'dat_camiseta',
                'dat_camiseta2',
                'dat_patrocinador',
                'dat_imagenpatro',
                'dat_notas',
                'datClub.clu_nomcorto' => [
                    'asc' => ['club.clu_nomcorto' => SORT_ASC,],
                    'desc' => ['club.clu_nomcorto' => SORT_DESC],
                    'label' => \Yii::t('app', 'Club'),
                ],
                'datTemporada.temporadacompleta' => [
                    'asc' => ['temporada.tem_inicio' => SORT_ASC,],
                    'desc' => ['temporada.tem_inicio' => SORT_DESC],
                    'label' => \Yii::t('app', 'Season'),
                ],
            ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['datClub']);
        $query->joinWith(['datTemporada']);
        
        $query->orFilterWhere(['like', 'dat_socios', $this->globalSearch])
            ->orFilterWhere(['like', 'dat_presupuesto', $this->globalSearch])
            ->orFilterWhere(['like', 'dat_patrocinador', $this->globalSearch])
            ->orFilterWhere(['like', 'club.clu_nombre', $this->globalSearch])
            ->orFilterWhere(['like', 'temporada.tem_inicio', $this->globalSearch])
            ->orFilterWhere(['like', 'temporada.tem_final', $this->globalSearch]);

        return $dataProvider;
    }
}
