<?php

namespace app\controllers;

use Yii;
use app\models\Pagamento;
use app\models\PagamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagamentoController implements the CRUD actions for Pagamento model.
 */
class PagamentoController extends Controller
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
     * Lists all Pagamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pagamento model.
     * @param integer $idpagamento
     * @param integer $venda_idvenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idpagamento, $venda_idvenda)
    {
        return $this->render('view', [
            'model' => $this->findModel($idpagamento, $venda_idvenda),
        ]);
    }

    /**
     * Creates a new Pagamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pagamento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpagamento' => $model->idpagamento, 'venda_idvenda' => $model->venda_idvenda]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pagamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idpagamento
     * @param integer $venda_idvenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idpagamento, $venda_idvenda)
    {
        $model = $this->findModel($idpagamento, $venda_idvenda);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpagamento' => $model->idpagamento, 'venda_idvenda' => $model->venda_idvenda]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pagamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idpagamento
     * @param integer $venda_idvenda
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idpagamento, $venda_idvenda)
    {
        $this->findModel($idpagamento, $venda_idvenda)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pagamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idpagamento
     * @param integer $venda_idvenda
     * @return Pagamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpagamento, $venda_idvenda)
    {
        if (($model = Pagamento::findOne(['idpagamento' => $idpagamento, 'venda_idvenda' => $venda_idvenda])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
