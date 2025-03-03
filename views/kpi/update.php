<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\InsertKpi $model */

//for update user's KPI

$this->title = 'Update Insert Kpi: ';
$this->params['breadcrumbs'][] = ['label' => 'KPI Table', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kpi_id, 'url' => ['view', 'kpi_id' => $model->kpi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="insert-kpi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('kpi_insertform', [
        'model' => $model,
    ]) ?>

</div>