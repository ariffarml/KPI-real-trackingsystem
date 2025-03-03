<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AddActivity $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="add-activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KPI_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activity_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activity_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
