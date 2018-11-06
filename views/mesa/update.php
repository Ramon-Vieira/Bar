<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mesa */

$this->title = Yii::t('app', 'Update Mesa: ' . $model->idmesa, [
    'nameAttribute' => '' . $model->idmesa,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mesas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmesa, 'url' => ['view', 'id' => $model->idmesa]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="mesa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
