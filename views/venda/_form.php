<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\money\MaskMoney;
use app\models\VendaHasProduto;

/* @var $this yii\web\View */
/* @var $model app\models\Venda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venda-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'valorTotal')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => 'R$ ',
                'value' => 0.00,
                'allowNegative' => false
            ]
        ]);?-->

    <?= $form->field($model, 'data')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'selecione uma data ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
    ]
]); ?>



    <?= $form->field($model, 'mesa_idmesa')->dropDownList($mesa) ?>

    <!-- $form->field($model, 'funcionario_idfuncionario')->textInput() -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
