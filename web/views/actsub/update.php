<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AddActivity $model */

$this->title = 'Update Add Activity: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Add Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="add-activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
