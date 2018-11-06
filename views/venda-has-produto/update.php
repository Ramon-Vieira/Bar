<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VendaHasProduto */

$this->title = Yii::t('app', 'Update Venda Has Produto: ' . $model->produto_idproduto, [
    'nameAttribute' => '' . $model->produto_idproduto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venda Has Produtos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->produto_idproduto, 'url' => ['view', 'produto_idproduto' => $model->produto_idproduto, 'venda_idvenda' => $model->venda_idvenda]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="venda-has-produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
