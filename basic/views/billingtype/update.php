<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\billingtype $model */

$this->title = 'Update Billingtype: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Billingtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="billingtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
