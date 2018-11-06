<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $idfuncionario
 * @property string $nomeFunc
 * @property string $cpf
 * @property int $usuario_idusuario
 *
 * @property Usuario $usuarioIdusuario
 * @property Venda[] $vendas
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idfuncionario', 'nomeFunc', 'cpf', 'usuario_idusuario'], 'required'],
            [['idfuncionario', 'usuario_idusuario'], 'integer'],
            [['nomeFunc', 'cpf'], 'string', 'max' => 45],
            [['idfuncionario'], 'unique'],
            [['usuario_idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_idusuario' => 'idusuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idfuncionario' => Yii::t('app', 'Idfuncionario'),
            'nomeFunc' => Yii::t('app', 'Nome Func'),
            'cpf' => Yii::t('app', 'Cpf'),
            'usuario_idusuario' => Yii::t('app', 'Usuario Idusuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'usuario_idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['funcionario_idfuncionario' => 'idfuncionario']);
    }
}
