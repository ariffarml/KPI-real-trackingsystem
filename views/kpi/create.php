<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

/** @var yii\web\View $this */
/** @var app\models\InsertKpi $model */

//$this->title = 'Insert KPI';
$this->params['breadcrumbs'][] = ['label' => 'Insert Kpis', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insert-kpi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('kpi_insertform', [
        'model' => $model,
    ]) ?>

</div>