<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $idusuario
 * @property string $nomeUsuario
 * @property resource $senhaUsuario
 * @property int $status
 * @property string $cargo
 *
 * @property Funcionario[] $funcionarios
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idusuario', 'nomeUsuario', 'senhaUsuario'], 'required'],
            [['idusuario', 'status'], 'integer'],
            [['senhaUsuario', 'cargo'], 'string'],
            [['nomeUsuario'], 'string', 'max' => 45],
            [['idusuario'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => Yii::t('app', 'Idusuario'),
            'nomeUsuario' => Yii::t('app', 'Nome Usuario'),
            'senhaUsuario' => Yii::t('app', 'Senha Usuario'),
            'status' => Yii::t('app', 'Status'),
            'cargo' => Yii::t('app', 'Cargo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['usuario_idusuario' => 'idusuario']);
    }
}
