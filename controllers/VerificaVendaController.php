<?php

namespace app\controllers;

use app\models\VendaHasProduto;
use app\models\Venda;
use app\models\Mesa;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

class VerificaVendaController extends \yii\web\Controller
{
    public function actionVerificar($idvenda)
    {

        $modelVendaProduto = VendaHasProduto::findAll(['venda_idvenda'=>$idvenda]);

        $resultPrecos = ArrayHelper::getColumn($modelVendaProduto, 'preco');

        if(!is_null($resultPrecos)){
  
                $soma = array_sum($resultPrecos);
                $modelVenda = Venda::findOne(['idvenda'=>$idvenda]);

                $modelVenda->valorTotal = $soma;
                if($modelVenda->save()){
                    $modelMesa = Mesa::findOne(['idmesa' => $modelVenda->mesa_idmesa]);
                    $modelMesa->status = "LIVRE";
                    $modelMesa->save();
                    return $this->redirect(Url::to(['venda/index']));
                }
            
        }



        //return $this->render('index');
    }

}