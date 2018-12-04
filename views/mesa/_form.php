<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mesa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numeroMesa')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'OCUPADO' => 'OCUPADO', 'LIVRE' => 'LIVRE', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
