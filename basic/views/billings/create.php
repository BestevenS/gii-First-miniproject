<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\billings $model */

$this->title = 'Create Billings';
$this->params['breadcrumbs'][] = ['label' => 'Billings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="billings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
