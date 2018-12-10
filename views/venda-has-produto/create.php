<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VendaHasProduto */

$this->title = Yii::t('app', 'Create Venda Has Produto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venda Has Produtos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-has-produto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'produtoVenda' => $produtoVenda,
    ]) ?>

</div>
