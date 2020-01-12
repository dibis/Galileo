<?php

namespace app\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\models\usuarios`.
 */
class UsuariosSearch extends usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username','name', 'surnames', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'globalSearch'], 'safe'],
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
        $query = usuarios::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['username'=>SORT_DESC]],
            'pagination'=> ['defaultPageSize' => 15]
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'username',
                'email',
                'status',
                'created_at',
                'itemAssignments.item_name' => [
                    'asc' => ['auth_assignment.item_name' => SORT_ASC,],
                    'desc' => ['auth_assignment.item_name' => SORT_DESC],
                    'label' => 'Permisos'
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['authAssignments']);
        
        // grid filtering conditions
//        $query->andFilterWhere([
//            'id' => $this->id,
//            'status' => $this->status,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
//        ]);

        $query->orFilterWhere(['like', 'username', $this->globalSearch])
            ->orFilterWhere(['like', 'email', $this->globalSearch]);

        return $dataProvider;
    }
}
