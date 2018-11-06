<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = Yii::t('app', 'Update Categoria: ' . $model->idcategoria, [
    'nameAttribute' => '' . $model->idcategoria,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcategoria, 'url' => ['view', 'id' => $model->idcategoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
