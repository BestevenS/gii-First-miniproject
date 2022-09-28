<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\payments $model */

$this->title = 'Update Payments: ' . $model->payment_no;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_no, 'url' => ['view', 'payment_no' => $model->payment_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
