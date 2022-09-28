<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\earthtype $model */

$this->title = 'Update Earthtype: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Earthtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="earthtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
