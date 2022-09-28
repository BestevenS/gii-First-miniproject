<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\payments;

/**
 * paymentsSearch represents the model behind the search form of `app\models\payments`.
 */
class paymentsSearch extends payments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_no', 'customer_id', 'billing_id'], 'integer'],
            [['price'], 'number'],
            [['type', 'date'], 'safe'],
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
        $query = payments::find();

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
            'payment_no' => $this->payment_no,
            'customer_id' => $this->customer_id,
            'price' => $this->price,
            'billing_id' => $this->billing_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
