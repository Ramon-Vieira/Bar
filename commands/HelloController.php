<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Usuario;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionPermissoes(){
        
        $auth = Yii::$app->authManager;

        $auth->removeAll();


        $gerente = $auth->createRole('gerente');
        $auth->add($gerente);
        $garcom = $auth->createRole('funcionario');
        $auth->add($garcom); 

        $tables = ['usuario','caixa'];
        foreach ($tables as $table) {
            echo "table: {$table}\n";

            $permRW = $auth->createPermission($table.'RW');
            $permR = $auth->createPermission($table.'R');

            $auth->add($permRW);
            $auth->add($permR);

            $auth->addChild($gerente,$permRW);
            $auth->addChild($garcom,$permR);

        }

        $produtoRW = $auth->createPermission('produtoRW');
        $produtoR = $auth->createPermission('produtoR');
        $auth->add($produtoRW);
        $auth->add($produtoR);
        $auth->addChild($garcom,$produtoRW);
        $auth->addChild($garcom,$produtoR);

        $vendaRW = $auth->createPermission('vendaRW');
        $vendaR = $auth->createPermission('vendaR');
        $auth->add($vendaRW);
        $auth->add($vendaR);
        $auth->addChild($garcom,$vendaRW);
        $auth->addChild($garcom,$vendaR);

        $mesaRW = $auth->createPermission('mesaRW');
        $mesaR = $auth->createPermission('mesaR');
        $auth->add($mesaRW);
        $auth->add($mesaR);
        $auth->addChild($garcom,$mesaRW);
        $auth->addChild($garcom,$mesaR);

        $auth->addChild($gerente,$garcom);

        $obj = Usuario::findOne(['username'=>'root']);
        if (!$obj) {
            $obj = new Usuario();
            $obj->username = 'root';
            $obj->password = '12345';
            $obj->save();
        }

        //associa a permissão de root ao id do usuário root
        $auth->assign($gerente,$obj->id);
        echo "sucessoooooooooo!\n";
    }




}