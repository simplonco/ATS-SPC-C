<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Telework;

/**
 * TeleworkSearch represents the model behind the search form about `frontend\models\Telework`.
 */
class TeleworkSearch extends Telework
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'approved', 'rejected'], 'integer'],
            [['LastName', 'FirstName', 'username', 'reason', 'start_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Telework::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'approved' => $this->approved,
            'rejected' => $this->rejected,
        ]);

        $query->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
