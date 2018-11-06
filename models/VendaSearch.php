<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venda;

/**
 * VendaSearch represents the model behind the search form of `app\models\Venda`.
 */
class VendaSearch extends Venda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idvenda', 'mesa_idmesa', 'funcionario_idfuncionario'], 'integer'],
            [['valorTotal'], 'number'],
            [['data'], 'safe'],
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
        $query = Venda::find();

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
            'idvenda' => $this->idvenda,
            'valorTotal' => $this->valorTotal,
            'data' => $this->data,
            'mesa_idmesa' => $this->mesa_idmesa,
            'funcionario_idfuncionario' => $this->funcionario_idfuncionario,
        ]);

        return $dataProvider;
    }
}
