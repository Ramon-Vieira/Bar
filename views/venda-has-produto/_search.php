<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VendaHasProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-has-produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'produto_idproduto') ?>

    <?= $form->field($model, 'venda_idvenda') ?>

    <?= $form->field($model, 'quantidade') ?>

    <?= $form->field($model, 'subtotal') ?>

    <?= $form->field($model, 'preco') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
