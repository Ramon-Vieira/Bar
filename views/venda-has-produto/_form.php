<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VendaHasProduto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-has-produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'produto_idproduto')->textInput() ?>

    <?= $form->field($model, 'venda_idvenda')->textInput() ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'subtotal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
