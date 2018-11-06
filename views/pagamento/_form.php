<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pagamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idpagamento')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'venda_idvenda')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
