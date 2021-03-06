<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "usuario".
 *
 * @property int $idusuario
 * @property string $username
 * @property string $password
 * @property string $access_token
 * @property string $auth_key
 * @property string $type
 *
 * @property Funcionario[] $funcionarios
 */
class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $password_repeat;

    const SCENARIO_CADASTRO = 'cadastro';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
    *criptografando a senha antes de salvar
    **/
    public function beforeSave($insert)
    {   
        //criptografando a senha
        if (array_key_exists('password',$this->dirtyAttributes)) {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        }
        return parent::beforeSave($insert);

    }
    //atribui o papel ao usuario logado
    public function afterSave ( $insert, $changedAttributes ) {
        Yii::trace('VALORES MODIFICADOS');
        Yii::trace($changedAttributes);
        if (isset($changedAttributes['type']) || $insert) {
            Yii::trace('Entrou no IF do isset');
            $auth = Yii::$app->authManager;
            if (!$insert) {
                Yii::trace('entrou no if do $insert');
                $auth->revokeAll($this->getId());
            }
            $novoPapel = $auth->getRole($this->type);
            //Yii::trace('papel:');
            Yii::trace($novoPapel);
            $auth->assign($novoPapel,$this->getId());
        }
        return parent::afterSave($insert,$changedAttributes);
    }
    public function afterDelete() {
        Yii::$app->authManager->revokeAll($this->getId());
    }


    public static function getType()
    {
        return[
            'gerente'=> Yii::t('app','Manager'),
            'funcionario'=> Yii::t('app','employee'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['password_repeat', 'type'], 'required', 'on' => self::SCENARIO_CADASTRO],
            [['type'], 'string'],
            [['type'],'in','range'=>['gerente','funcionario']],
            [['username'], 'string', 'max' => 45],
            [['password', 'access_token', 'auth_key'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['password'], 'unique'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password', 'operator' => '==='],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => Yii::t('app', 'Idusuario'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'access_token' => Yii::t('app', 'Access Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * Localiza uma identidade pelo ID informado
     *
     * @param string|int $id o ID a ser localizado
     * @return IdentityInterface|null o objeto da identidade que corresponde ao ID informado
     */
    public static function findIdentity($idusuario)
    {
        return static::findOne(['username' => $idusuario]);
    }

    /**
     * Localiza uma identidade pelo token informado
     *
     * @param string $token o token a ser localizado
     * @return IdentityInterface|null o objeto da identidade que corresponde ao token informado
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string o ID do usuário atual
     */
    public function getId()
    {
        return $this->username;
    }

    /**
     * @return string a chave de autenticação do usuário atual
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool se a chave de autenticação do usuário atual for válida
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    

    public function validatePassword($password){
        return Yii::$app->getSecurity()->validatePassword($password,$this->password);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['usuario_idusuario' => 'idusuario']);
    }
}
























