<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VendaHasProduto */

$this->title = $model->produto_idproduto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venda Has Produtos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-has-produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'produto_idproduto' => $model->produto_idproduto, 'venda_idvenda' => $model->venda_idvenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'produto_idproduto' => $model->produto_idproduto, 'venda_idvenda' => $model->venda_idvenda], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'produto_idproduto',
            'venda_idvenda',
            'quantidade',
            'subtotal',
            'preco',
        ],
    ]) ?>

</div>
