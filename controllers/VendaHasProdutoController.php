<?php

namespace app\controllers;

use Yii;
use app\models\VendaHasProduto;
use app\models\VendaHasProdutoSearch;
use app\models\Produto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * VendaHasProdutoController implements the CRUD actions for VendaHasProduto model.
 */
class VendaHasProdutoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all VendaHasProduto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendaHasProdutoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionIndexVendaProduto($idvenda)
    {
        $searchModel = new VendaHasProdutoSearch();
        $dataProvider = $searchModel->search($idvenda,Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idvenda' => $idvenda,
        ]);
    }


    /**
     * Displays a single VendaHasProduto model.
     * @param integer $produto_idproduto
     * @param integer $venda_idvenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($produto_idproduto, $venda_idvenda)
    {
        return $this->render('view', [
            'model' => $this->findModel($produto_idproduto, $venda_idvenda),
        ]);
    }

    /**
     * Creates a new VendaHasProduto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idvenda)
    {
        $model = new VendaHasProduto();

        if ($model->load(Yii::$app->request->post())) {

            $modelProduto = Produto::findOne(['idproduto'=>$model->produto_idproduto]);
            if($model->quantidade <= $modelProduto->quantidade){
                $subtrairQuantidadeEstoque = $modelProduto->quantidade - $model->quantidade;
                $modelProduto->quantidade = $subtrairQuantidadeEstoque;
                $modelProduto->save();
                $valorUniProd =  $modelProduto->valorUni;
                
                $model->subtotal = $this->calcularSubtotal($model->quantidade, $valorUniProd);
                $model->preco = $model->subtotal;
                $model->venda_idvenda = $idvenda;
                  
            }
            if($model->save()){
                    return $this->redirect(Url::to(['venda-has-produto/create', 'idvenda'=>$idvenda]));
                } 
        }

        return $this->render('create', [
            'model' => $model,
            'produtoVenda' => Produto::getProdutoVenda(),
            'idvenda' => $idvenda,
        ]);
    }

    /**
     * Updates an existing VendaHasProduto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $produto_idproduto
     * @param integer $venda_idvenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($produto_idproduto, $venda_idvenda)
    {
        $model = $this->findModel($produto_idproduto, $venda_idvenda);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $modelProduto = Produto::findOne(['idproduto'=>$model->produto_idproduto]);
            if($model->quantidade <= $modelProduto->quantidade){
                $subtrairQuantidadeEstoque = $modelProduto->quantidade - $model->quantidade;
                $modelProduto->quantidade = $subtrairQuantidadeEstoque;
                $modelProduto->save();
                $valorUniProd =  $modelProduto->valorUni;
                
                $model->subtotal = $this->calcularSubtotal($model->quantidade, $valorUniProd);
                $model->preco = $model->subtotal;
                  
            }
            if($model->save()){
                    return $this->redirect(Url::to(['venda-has-produto/index-venda-produto', 'idvenda'=>$model->venda_idvenda]));
                } 
        }

        return $this->render('update', [
            'model' => $model,
            'produtoVenda' => Produto::getProdutoVenda(),
        ]);
    }

    /**
     * Deletes an existing VendaHasProduto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $produto_idproduto
     * @param integer $venda_idvenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($produto_idproduto, $venda_idvenda)
    {
        $this->findModel($produto_idproduto, $venda_idvenda)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VendaHasProduto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $produto_idproduto
     * @param integer $venda_idvenda
     * @return VendaHasProduto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($produto_idproduto, $venda_idvenda)
    {
        if (($model = VendaHasProduto::findOne(['produto_idproduto' => $produto_idproduto, 'venda_idvenda' => $venda_idvenda])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function calcularSubtotal($quantidade, $valorUnitario){
        $resultado = $quantidade * $valorUnitario;
        return $resultado;
    }
}
