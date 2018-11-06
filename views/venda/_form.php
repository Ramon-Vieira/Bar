<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Venda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valorTotal')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'mesa_idmesa')->textInput() ?>

    <?= $form->field($model, 'funcionario_idfuncionario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
