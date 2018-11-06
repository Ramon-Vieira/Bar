<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $idproduto
 * @property int $categoria_idcategoria
 * @property string $nomeproduto
 * @property string $descricao
 * @property int $quantidade
 * @property double $valorUni
 *
 * @property Categoria $categoriaIdcategoria
 * @property VendaHasProduto[] $vendaHasProdutos
 * @property Venda[] $vendaIdvendas
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria_idcategoria', 'nomeproduto', 'descricao', 'quantidade', 'valorUni'], 'required'],
            [['categoria_idcategoria', 'quantidade'], 'integer'],
            [['valorUni'], 'number'],
            [['nomeproduto', 'descricao'], 'string', 'max' => 100],
            [['categoria_idcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_idcategoria' => 'idcategoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproduto' => Yii::t('app', 'Idproduto'),
            'categoria_idcategoria' => Yii::t('app', 'Categoria Idcategoria'),
            'nomeproduto' => Yii::t('app', 'Nomeproduto'),
            'descricao' => Yii::t('app', 'Descricao'),
            'quantidade' => Yii::t('app', 'Quantidade'),
            'valorUni' => Yii::t('app', 'Valor Uni'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaIdcategoria()
    {
        return $this->hasOne(Categoria::className(), ['idcategoria' => 'categoria_idcategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaHasProdutos()
    {
        return $this->hasMany(VendaHasProduto::className(), ['produto_idproduto' => 'idproduto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaIdvendas()
    {
        return $this->hasMany(Venda::className(), ['idvenda' => 'venda_idvenda'])->viaTable('venda_has_produto', ['produto_idproduto' => 'idproduto']);
    }
}
