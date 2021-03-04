<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proxy;

/**
 * ProxySearch represents the model behind the search form of `app\models\Proxy`.
 */
class ProxySearch extends Proxy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'port', 'latency', 'status'], 'integer'],
            [['ip_v4', 'ip_v6', 'updated_at', 'real_ip', 'type', 'country_code', 'city_name'], 'safe'],
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
        $query = Proxy::find();

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
            'port' => $this->port,
            'updated_at' => $this->updated_at,
            'latency' => $this->latency,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ip_v4', $this->ip_v4])
            ->andFilterWhere(['like', 'ip_v6', $this->ip_v6])
            ->andFilterWhere(['like', 'real_ip', $this->real_ip])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'country_code', $this->country_code])
            ->andFilterWhere(['like', 'city_name', $this->city_name]);

        return $dataProvider;
    }
}
