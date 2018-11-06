<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idusuario')->textInput() ?>

    <?= $form->field($model, 'nomeUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senhaUsuario')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'cargo')->dropDownList([ 'GERENTE' => 'GERENTE', 'FUNCIONARIO' => 'FUNCIONARIO', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
