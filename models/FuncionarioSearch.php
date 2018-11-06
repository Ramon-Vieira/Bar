<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Funcionario;

/**
 * FuncionarioSearch represents the model behind the search form of `app\models\Funcionario`.
 */
class FuncionarioSearch extends Funcionario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idfuncionario', 'usuario_idusuario'], 'integer'],
            [['nomeFunc', 'cpf'], 'safe'],
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
        $query = Funcionario::find();

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
            'idfuncionario' => $this->idfuncionario,
            'usuario_idusuario' => $this->usuario_idusuario,
        ]);

        $query->andFilterWhere(['like', 'nomeFunc', $this->nomeFunc])
            ->andFilterWhere(['like', 'cpf', $this->cpf]);

        return $dataProvider;
    }
}
