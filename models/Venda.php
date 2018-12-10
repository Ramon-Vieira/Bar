<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda".
 *
 * @property int $idvenda
 * @property double $valorTotal
 * @property string $data
 * @property int $mesa_idmesa
 * @property int $funcionario_idfuncionario
 *
 * @property CaixaHasVenda[] $caixaHasVendas
 * @property Caixa[] $caixaIdcaixas
 * @property Pagamento[] $pagamentos
 * @property Funcionario $funcionarioIdfuncionario
 * @property Mesa $mesaIdmesa
 * @property VendaHasProduto[] $vendaHasProdutos
 * @property Produto[] $produtoIdprodutos
 */
class Venda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'data', 'mesa_idmesa', 'funcionario_idfuncionario'], 'required'],
            [['valorTotal'], 'number'],
            [['data'], 'date', 'format'=>'yyyy-mm-dd'],
            [['mesa_idmesa', 'funcionario_idfuncionario'], 'integer'],
            [['funcionario_idfuncionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['funcionario_idfuncionario' => 'idfuncionario']],
            [['mesa_idmesa'], 'exist', 'skipOnError' => true, 'targetClass' => Mesa::className(), 'targetAttribute' => ['mesa_idmesa' => 'idmesa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idvenda' => Yii::t('app', 'Idvenda'),
            'valorTotal' => Yii::t('app', 'Valor Total'),
            'data' => Yii::t('app', 'Data'),
            'mesa_idmesa' => Yii::t('app', 'Mesa Idmesa'),
            'funcionario_idfuncionario' => Yii::t('app', 'Funcionario Idfuncionario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaixaHasVendas()
    {
        return $this->hasMany(CaixaHasVenda::className(), ['venda_idvenda' => 'idvenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaixaIdcaixas()
    {
        return $this->hasMany(Caixa::className(), ['idcaixa' => 'caixa_idcaixa'])->viaTable('caixa_has_venda', ['venda_idvenda' => 'idvenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamento::className(), ['venda_idvenda' => 'idvenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioIdfuncionario()
    {
        return $this->hasOne(Funcionario::className(), ['idfuncionario' => 'funcionario_idfuncionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMesaIdmesa()
    {
        return $this->hasOne(Mesa::className(), ['idmesa' => 'mesa_idmesa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaHasProdutos()
    {
        return $this->hasMany(VendaHasProduto::className(), ['venda_idvenda' => 'idvenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoIdprodutos()
    {
        return $this->hasMany(Produto::className(), ['idproduto' => 'produto_idproduto'])->viaTable('venda_has_produto', ['venda_idvenda' => 'idvenda']);
    }
}
