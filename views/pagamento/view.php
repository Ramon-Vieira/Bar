<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pagamento */

$this->title = $model->idpagamento;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagamentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idpagamento' => $model->idpagamento, 'venda_idvenda' => $model->venda_idvenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idpagamento' => $model->idpagamento, 'venda_idvenda' => $model->venda_idvenda], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpagamento',
            'valor',
            'venda_idvenda',
        ],
    ]) ?>

</div>
