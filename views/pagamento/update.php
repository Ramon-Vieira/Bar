<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pagamento */

$this->title = Yii::t('app', 'Update Pagamento: ' . $model->idpagamento, [
    'nameAttribute' => '' . $model->idpagamento,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagamentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpagamento, 'url' => ['view', 'idpagamento' => $model->idpagamento, 'venda_idvenda' => $model->venda_idvenda]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pagamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
