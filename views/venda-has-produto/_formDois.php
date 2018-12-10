<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Venda;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\VendaHasProduto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-has-produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'produto_idproduto')->widget(Select2::classname(),[ 
        'data'=> $produtoVenda,
        'options' =>['placeholder' => 'Select a category product ...'],
        'pluginOptions' =>[
            'allowClear'=> true
        ],
        ]);
    ?>

    <!--?= $form->field($model, 'venda_idvenda')->textInput() ?-->

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <!-- $form->field($model, 'subtotal')->textInput(['maxlength' => true]) -->

    <!-- $form->field($model, 'preco')->textInput(['maxlength' => true]) -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
