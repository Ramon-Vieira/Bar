<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categoria;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- $form->field($model, 'categoria_idcategoria')->textInput() -->

    <?= $form->field($model, 'nomeproduto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'valorUni')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => 'R$ ',
                'value' => 0.00,
                'allowNegative' => false
            ]
        ]);?>

    <?= $form->field($modelCategoria, 'nomecategoria')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
