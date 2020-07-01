<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Partido;

/**
 * PartidoSearch represents the model behind the search form of `app\models\Partido`.
 */
class PartidoSearch extends Partido {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['par_id', 'par_jornada', 'par_equipo1', 'par_equipo2', 'par_resultado1',
            'par_resultado2', 'par_jugado', 'par_aplazado', 'par_estadio',
            'par_sancion1equipo', 'par_sancion2equipo'], 'integer'],
            [['par_quiniela', 'par_fecha', 'par_hora', 'par_notas', 'par_cronica',
            'par_create_at', 'par_update_at', 'globalSearch'], 'safe'],
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
        $query = Partido::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['par_create_at' => SORT_ASC]],
            'pagination' => ['defaultPageSize' => 15]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'parJornada.jor_nombrenum' => [
                    'asc' => ['jornada.jor_nombrenum' => SORT_ASC,],
                    'desc' => ['jornada.jor_nombrenum' => SORT_DESC],
                    'label' => \Yii::t('app', 'Matchday'),
                ],
                'parEquipo.equ_nomcorto' => [
                    'asc' => ['equipo.equ_nomcorto' => SORT_ASC,],
                    'desc' => ['equipo.equ_nomcorto' => SORT_DESC],
                    'label' => \Yii::t('app', 'Team'),
                ],
                'par_resultado1',
                'par_resultado2',
                'par_jugado',
                'par_fecha',
                'par_hora',
                'par_aplazado',
                'parEstadio.est_nombre' => [
                    'asc' => ['estadio.est_nombre' => SORT_ASC,],
                    'desc' => ['estadio.est_nombre' => SORT_DESC],
                    'label' => \Yii::t('app', 'Stadium'),
                ],
                'par_sancion1equipo',
                'par_sancion2equipo',
                'par_create_at',
                'par_update_at',
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['parEquipo1']);
        $query->joinWith(['parEquipo2']);
        $query->joinWith(['parJornada']);

        $query->orFilterWhere(['like', 'jornada.jor_nombrenum', $this->globalSearch])
                ->orFilterWhere(['like', 'equipo.equ_nomcorto', $this->globalSearch])
                ->orFilterWhere(['like', 'par_resultado1', $this->globalSearch])
                ->orFilterWhere(['like', 'par_resultado2', $this->globalSearch])
                ->orFilterWhere(['like', 'par_fecha', $this->globalSearch])
                ->orFilterWhere(['like', 'par_hora', $this->globalSearch])
                ->orFilterWhere(['like', 'estadio.est_nombre', $this->globalSearch]);

        return $dataProvider;
    }

}
