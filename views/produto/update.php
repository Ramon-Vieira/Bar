<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */

$this->title = Yii::t('app', 'Update Produto: ' . $model->idproduto, [
    'nameAttribute' => '' . $model->idproduto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Produtos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproduto, 'url' => ['view', 'id' => $model->idproduto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
