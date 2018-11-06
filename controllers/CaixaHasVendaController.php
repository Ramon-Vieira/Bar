<?php

namespace app\controllers;

use Yii;
use app\models\CaixaHasVenda;
use app\models\CaixaHasVendaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CaixaHasVendaController implements the CRUD actions for CaixaHasVenda model.
 */
class CaixaHasVendaController extends Controller
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
     * Lists all CaixaHasVenda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CaixaHasVendaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CaixaHasVenda model.
     * @param integer $caixa_idcaixa
     * @param integer $venda_idvenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($caixa_idcaixa, $venda_idvenda)
    {
        return $this->render('view', [
            'model' => $this->findModel($caixa_idcaixa, $venda_idvenda),
        ]);
    }

    /**
     * Creates a new CaixaHasVenda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CaixaHasVenda();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caixa_idcaixa' => $model->caixa_idcaixa, 'venda_idvenda' => $model->venda_idvenda]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CaixaHasVenda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $caixa_idcaixa
     * @param integer $venda_idvenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($caixa_idcaixa, $venda_idvenda)
    {
        $model = $this->findModel($caixa_idcaixa, $venda_idvenda);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'caixa_idcaixa' => $model->caixa_idcaixa, 'venda_idvenda' => $model->venda_idvenda]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CaixaHasVenda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $caixa_idcaixa
     * @param integer $venda_idvenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($caixa_idcaixa, $venda_idvenda)
    {
        $this->findModel($caixa_idcaixa, $venda_idvenda)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CaixaHasVenda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $caixa_idcaixa
     * @param integer $venda_idvenda
     * @return CaixaHasVenda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($caixa_idcaixa, $venda_idvenda)
    {
        if (($model = CaixaHasVenda::findOne(['caixa_idcaixa' => $caixa_idcaixa, 'venda_idvenda' => $venda_idvenda])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
