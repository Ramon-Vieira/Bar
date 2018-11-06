<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda_has_produto".
 *
 * @property int $produto_idproduto
 * @property int $venda_idvenda
 * @property int $quantidade
 * @property string $subtotal
 * @property string $preco
 *
 * @property Venda $vendaIdvenda
 * @property Produto $produtoIdproduto
 */
class VendaHasProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venda_has_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['produto_idproduto', 'venda_idvenda', 'quantidade'], 'required'],
            [['produto_idproduto', 'venda_idvenda', 'quantidade'], 'integer'],
            [['subtotal', 'preco'], 'number'],
            [['produto_idproduto', 'venda_idvenda'], 'unique', 'targetAttribute' => ['produto_idproduto', 'venda_idvenda']],
            [['venda_idvenda'], 'exist', 'skipOnError' => true, 'targetClass' => Venda::className(), 'targetAttribute' => ['venda_idvenda' => 'idvenda']],
            [['produto_idproduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['produto_idproduto' => 'idproduto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'produto_idproduto' => Yii::t('app', 'Produto Idproduto'),
            'venda_idvenda' => Yii::t('app', 'Venda Idvenda'),
            'quantidade' => Yii::t('app', 'Quantidade'),
            'subtotal' => Yii::t('app', 'Subtotal'),
            'preco' => Yii::t('app', 'Preco'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaIdvenda()
    {
        return $this->hasOne(Venda::className(), ['idvenda' => 'venda_idvenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoIdproduto()
    {
        return $this->hasOne(Produto::className(), ['idproduto' => 'produto_idproduto']);
    }
}
