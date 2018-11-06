<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CaixaHasVenda */

$this->title = $model->caixa_idcaixa;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Caixa Has Vendas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caixa-has-venda-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'caixa_idcaixa' => $model->caixa_idcaixa, 'venda_idvenda' => $model->venda_idvenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'caixa_idcaixa' => $model->caixa_idcaixa, 'venda_idvenda' => $model->venda_idvenda], [
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
            'caixa_idcaixa',
            'venda_idvenda',
        ],
    ]) ?>

</div>
