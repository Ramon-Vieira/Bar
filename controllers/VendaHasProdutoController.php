<?php

namespace app\controllers;

use Yii;
use app\models\VendaHasProduto;
use app\models\VendaHasProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionCreate()
    {
        $model = new VendaHasProduto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'produto_idproduto' => $model->produto_idproduto, 'venda_idvenda' => $model->venda_idvenda]);
        }

        return $this->render('create', [
            'model' => $model,
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
            return $this->redirect(['view', 'produto_idproduto' => $model->produto_idproduto, 'venda_idvenda' => $model->venda_idvenda]);
        }

        return $this->render('update', [
            'model' => $model,
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
}
