<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Venda */

$this->title = Yii::t('app', 'Update Venda: ' . $model->idvenda, [
    'nameAttribute' => '' . $model->idvenda,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vendas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idvenda, 'url' => ['view', 'id' => $model->idvenda]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="venda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mesa' => $mesa,
    ]) ?>

</div>
