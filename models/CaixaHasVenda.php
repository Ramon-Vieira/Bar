<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caixa_has_venda".
 *
 * @property int $caixa_idcaixa
 * @property int $venda_idvenda
 *
 * @property Caixa $caixaIdcaixa
 * @property Venda $vendaIdvenda
 */
class CaixaHasVenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caixa_has_venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['caixa_idcaixa', 'venda_idvenda'], 'required'],
            [['caixa_idcaixa', 'venda_idvenda'], 'integer'],
            [['caixa_idcaixa', 'venda_idvenda'], 'unique', 'targetAttribute' => ['caixa_idcaixa', 'venda_idvenda']],
            [['caixa_idcaixa'], 'exist', 'skipOnError' => true, 'targetClass' => Caixa::className(), 'targetAttribute' => ['caixa_idcaixa' => 'idcaixa']],
            [['venda_idvenda'], 'exist', 'skipOnError' => true, 'targetClass' => Venda::className(), 'targetAttribute' => ['venda_idvenda' => 'idvenda']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'caixa_idcaixa' => Yii::t('app', 'Caixa Idcaixa'),
            'venda_idvenda' => Yii::t('app', 'Venda Idvenda'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaixaIdcaixa()
    {
        return $this->hasOne(Caixa::className(), ['idcaixa' => 'caixa_idcaixa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaIdvenda()
    {
        return $this->hasOne(Venda::className(), ['idvenda' => 'venda_idvenda']);
    }
}
