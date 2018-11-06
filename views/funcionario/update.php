<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionario */

$this->title = Yii::t('app', 'Update Funcionario: ' . $model->idfuncionario, [
    'nameAttribute' => '' . $model->idfuncionario,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idfuncionario, 'url' => ['view', 'id' => $model->idfuncionario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="funcionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
