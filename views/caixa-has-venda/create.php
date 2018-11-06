<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CaixaHasVenda */

$this->title = Yii::t('app', 'Create Caixa Has Venda');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Caixa Has Vendas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caixa-has-venda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
