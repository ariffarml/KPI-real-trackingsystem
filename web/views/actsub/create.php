<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AddActivity $model */

$this->title = 'Create Add Activity';
$this->params['breadcrumbs'][] = ['label' => 'Add Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
