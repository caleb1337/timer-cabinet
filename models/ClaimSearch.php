<?php

namespace app\models;

use app\models\Claim;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * ClaimSearch represents the model behind the search form of `app\models\Claim`.
 */
class ClaimSearch extends Claim
{
    /**
     * {@inheritdoc}
     */

    public string $org_name = '';
    public string $resp_manager = '';

    public function rules() :array
    {
        return [
            [['claim_id', 'organization_id', 'manager_id'], 'integer'],
            [['description', 'date_of_creation','org_name','resp_manager'], 'safe'],
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
        $query = Claim::find()->joinWith('manager',)->joinWith('organization');

        // add conditions that should always apply here
        $model = new Claim();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>[
                'attributes' => [
                    'claim_id',
                    'org_name' => [
                        'asc' => ['organizations.organization_name' => SORT_ASC],
                        'desc' => ['organizations.organization_name' => SORT_DESC],
                    ],
                    'resp_manager' => [
                        'asc' =>  ['users.last_name' => SORT_ASC, 'users.first_name' => SORT_ASC, 'users.surname' => SORT_ASC],
                        'desc' => ['users.last_name' => SORT_DESC, 'users.first_name' => SORT_DESC, 'users.surname' => SORT_DESC],
                    ],
                    'description',
                    'date_of_creation',
                ],
            ],
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'claim_id' => $this->claim_id,
            'organization_id' => $this->organization_id,
            'manager_id' => $this->manager_id,
            'date_of_creation' => $this->date_of_creation,
        ]);
        $fullname = ['users.last_name','users.first_name','users.surname'];
        $query->andFilterWhere(['like', 'description', $this->description]);
        $query->andFilterWhere(['like', 'organizations.organization_name',$this->org_name]);
        $query->andFilterWhere(['like', 'users.last_name', $this->resp_manager]);


        return $dataProvider;

    }

}
