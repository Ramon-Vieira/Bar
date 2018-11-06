<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caixa".
 *
 * @property int $idcaixa
 * @property string $valor
 *
 * @property CaixaHasVenda[] $caixaHasVendas
 * @property Venda[] $vendaIdvendas
 */
class Caixa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caixa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idcaixa'], 'required'],
            [['idcaixa'], 'integer'],
            [['valor'], 'string', 'max' => 45],
            [['idcaixa'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcaixa' => Yii::t('app', 'Idcaixa'),
            'valor' => Yii::t('app', 'Valor'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaixaHasVendas()
    {
        return $this->hasMany(CaixaHasVenda::className(), ['caixa_idcaixa' => 'idcaixa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaIdvendas()
    {
        return $this->hasMany(Venda::className(), ['idvenda' => 'venda_idvenda'])->viaTable('caixa_has_venda', ['caixa_idcaixa' => 'idcaixa']);
    }
}
