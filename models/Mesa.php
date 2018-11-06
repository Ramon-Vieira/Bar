<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mesa".
 *
 * @property int $idmesa
 * @property int $numeroMesa
 * @property string $status
 *
 * @property Venda[] $vendas
 */
class Mesa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mesa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmesa', 'numeroMesa'], 'required'],
            [['idmesa', 'numeroMesa'], 'integer'],
            [['status'], 'string'],
            [['idmesa'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmesa' => Yii::t('app', 'Idmesa'),
            'numeroMesa' => Yii::t('app', 'Numero Mesa'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['mesa_idmesa' => 'idmesa']);
    }
}
