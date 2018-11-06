<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CaixaHasVenda */

$this->title = Yii::t('app', 'Update Caixa Has Venda: ' . $model->caixa_idcaixa, [
    'nameAttribute' => '' . $model->caixa_idcaixa,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Caixa Has Vendas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->caixa_idcaixa, 'url' => ['view', 'caixa_idcaixa' => $model->caixa_idcaixa, 'venda_idvenda' => $model->venda_idvenda]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="caixa-has-venda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
