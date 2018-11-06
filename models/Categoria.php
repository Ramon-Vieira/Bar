<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $idcategoria
 * @property string $nomecategoria
 *
 * @property Produto[] $produtos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomecategoria'], 'required'],
            [['nomecategoria'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcategoria' => Yii::t('app', 'Idcategoria'),
            'nomecategoria' => Yii::t('app', 'Nomecategoria'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['categoria_idcategoria' => 'idcategoria']);
    }
}
