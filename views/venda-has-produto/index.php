<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Venda;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VendaHasProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Venda Has Produtos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-has-produto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Venda Has Produto'),Url::toRoute( ['venda-has-produto/create','idvenda'=>venda::findOne($idvenda)->idvenda]), ['class' => 'btn btn-success']) ?>


        <?= Html::a(Yii::t('app', 'Back to sell'),Url::toRoute( ['venda/index']), ['class' => 'btn btn-success']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'produto_idproduto',
            'venda_idvenda',
            'quantidade',
            'subtotal',
            'preco',

            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>
</div>
