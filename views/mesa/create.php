<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mesa */

$this->title = Yii::t('app', 'Create Mesa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mesas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
