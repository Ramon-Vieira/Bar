<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagamento".
 *
 * @property int $idpagamento
 * @property double $valor
 * @property int $venda_idvenda
 *
 * @property Venda $vendaIdvenda
 */
class Pagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpagamento', 'venda_idvenda'], 'required'],
            [['idpagamento', 'venda_idvenda'], 'integer'],
            [['valor'], 'number'],
            [['idpagamento', 'venda_idvenda'], 'unique', 'targetAttribute' => ['idpagamento', 'venda_idvenda']],
            [['venda_idvenda'], 'exist', 'skipOnError' => true, 'targetClass' => Venda::className(), 'targetAttribute' => ['venda_idvenda' => 'idvenda']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpagamento' => Yii::t('app', 'Idpagamento'),
            'valor' => Yii::t('app', 'Valor'),
            'venda_idvenda' => Yii::t('app', 'Venda Idvenda'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendaIdvenda()
    {
        return $this->hasOne(Venda::className(), ['idvenda' => 'venda_idvenda']);
    }
}
