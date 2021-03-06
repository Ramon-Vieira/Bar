<?php

namespace app\controllers;

use Yii;
use app\models\Venda;
use app\models\VendaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Mesa;
use app\models\Funcionario;
use yii\helpers\Url;


/**
 * VendaController implements the CRUD actions for Venda model.
 */
class VendaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
               'class' => AccessControl::className(),
               'only' => ['create', 'update', 'delete'],
               'rules' => [
                                      [
                       'allow' => true,
                       'actions' => ['create', 'update', 'delete'],
                       'roles' => ['@'],
                   ],
               ],
           ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Venda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venda model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Venda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venda();

        if ($model->load(Yii::$app->request->post()) ) {
            
            $idUsuarioLogado = \Yii::$app->user->getIdentity();

            if (!is_null($idUsuarioLogado)) {
                $idUsuarioLogado = Funcionario::findOne(['usuario_idusuario'=>$idUsuarioLogado])->idfuncionario;

                $model->funcionario_idfuncionario = $idUsuarioLogado;

            }

            
                if ($model->save()) {
                    $modelMesa = Mesa::findOne(['idmesa' => $model->mesa_idmesa]);
                    $modelMesa->status = "OCUPADO";
                    $modelMesa->save();
                    return $this->redirect(Url::to(['venda-has-produto/create','idvenda'=>$model->idvenda]));                    
                }

        }

        return $this->render('create', [
            'model' => $model,
            'mesa' => Mesa::getListarMesas(),
        ]);
    }

    /**
     * Updates an existing Venda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idvenda]);
        }

        return $this->render('update', [
            'model' => $model,
            'mesa' => Mesa::getListarMesas(),
        ]);
    }

    /**
     * Deletes an existing Venda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Venda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Venda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
