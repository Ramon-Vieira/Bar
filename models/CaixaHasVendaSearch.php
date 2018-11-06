<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CaixaHasVenda;

/**
 * CaixaHasVendaSearch represents the model behind the search form of `app\models\CaixaHasVenda`.
 */
class CaixaHasVendaSearch extends CaixaHasVenda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['caixa_idcaixa', 'venda_idvenda'], 'integer'],
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
        $query = CaixaHasVenda::find();

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
            'caixa_idcaixa' => $this->caixa_idcaixa,
            'venda_idvenda' => $this->venda_idvenda,
        ]);

        return $dataProvider;
    }
}
