<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Kpi_Insert;
use yii\helpers\Url;

$this->title = 'Update Progress Form';
$this->params['breadcrumbs'][] = $this->title;

?>

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<div class="progress-form">
    <br>
    <h1><?= Html::encode($this->title)?></h1>
    <h1><progress value ="80" max ="100" ></progress></h1>
    <br>

    <div class="container mt-3" style="border-style: solid; border-color:#E9F2FC">
        <?php $form = ActiveForm::begin([
                    'enableAjaxValidation' => false,
                    'options' => [],
                ]); ?>

        <br>
        <div class= "container-updateprogressform">

            <div class= "row">
                <div class = "col-lg-6">
                    <br>
                    <?= $form->field($model, 'subactivity_id')->dropDownList($dropdownData, [
                        'prompt' => "Select the subactivity's description ",
                        'id'=> 'subactivity-id'])?> <!--dropdown list-->
                </div>

                <div class= "col-lg-3">
                    <br>
                    <?= $form->field($model, 'kpi_year')->textInput([
                        'disabled'=>true, 'id' => 'kpiyear']) ?>
                </div>

            </div>
            
            <div class= "row">
                <div class= "col-lg-6">
                    <?= $form->field($model, 'kpi_desc')->textInput([
                        'disabled'=>true, 'id' => 'kpidesc']) ?>
        
                </div>
            </div>
            <div class= "row">
                <div class= "col-lg-6">
                    <?= $form->field($model, 'activity_desc')->textInput([
                        'disabled' => true, 'id'=>'activitydesc']) ?>
                </div>

            </div>
            <div class= "row">
                <div class= "col-lg-6">
                    <?= $form->field($model, 'subactivity_desc')->textInput([
                        'disabled'=>true, 'id'=>'subdesc']) ?>
                </div>

            </div>
            <div class = "row">
                <div class= "col-lg-3">
                    <?= $form->field($model, 'month')->dropDownList($monthsupdate,['prompt' => 'Select month']) ?>
                </div>

            </div>

            <div class= "row">
                <div class= "col-lg-3">
                    <?= $form->field($model, 'kpi_target')->textInput([
                        'disabled'=>true, 'id'=>'kpitarget']) ?>
                </div>

            </div>

            <div class= "row">
                <div class = "col-lg-3">
                    <?= $form->field($model, 'progress')->textInput() ?>
                </div>

            </div>

            <div class= "row">
                <div class= "col-lg-12">
                    <?= $form->field($model, 'notes')->textarea(['rows'=> 5]) ?>
                </div>

            </div>

            <div class= "row" style="display:none">
                <div class="col-lg-6">
                    <?= $form->field($model, 'update_date')->textInput(['disabled' => true, 'value' => date(strtotime($model->update_date))])?>
                    <?= $form->field($model, 'kpi_year')->hiddenInput(['id' => 'kpiyear_hidden'])->label(false) ?>
                    <?= $form->field($model, 'activity_desc')->hiddenInput(['id'=>'activitydesc_hidden'])->label(false) ?>
                    <?= $form->field($model, 'subactivity_desc')->hiddenInput(['id'=>'subdesc_hidden'])->label(false) ?>
                    <?= $form->field($model, 'kpi_desc')->hiddenInput(['id'=>'kpidesc_hidden'])->label(false) ?>
                    <?= $form->field($model, 'kpi_target')->hiddenInput(['id'=>'kpitarget_hidden'])->label(false) ?>
                </div>

            </div>
            <br><br>


        </div>
            <?= Html::submitButton('Save', ['class'=>'btn btn-success']) ?>
            <br><br><br><br>

        <?php $form = ActiveForm::end(); ?>

    </div>

</div>

<script>
            $('#subactivity-id').change(function() {
            var subactivityId = $(this).val();
            $.ajax({
                url: 'index.php?r=update%2Fget-subactivity-details', // Adjust the route as needed
                type: 'GET',
                data: {id: subactivityId},
                success: function(data) {
                    if(data.error) {
                        console.error(data.error);
                    } else {
                    //$('#subactivity-id').val(data.subactivity-id); //from table subactivity
                    $('#kpiyear').val(data.kpiyear); //from table subactivity
                    $('#activitydesc').val(data.activitydesc); //from table activity
                    $('#subdesc').val(data.subdesc); //from table subactivity
                    $('#kpidesc').val(data.kpidesc);
                    $('#kpitarget').val(data.kpitarget);

                    //for hidden inputs
                    $('#kpiyear_hidden').val(data.kpiyear);
                    $('#activitydesc_hidden').val(data.activitydesc);
                    $('#subdesc_hidden').val(data.subdesc);
                    $('#kpidesc_hidden').val(data.kpidesc);
                    $('#kpitarget_hidden').val(data.kpitarget);
                }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                }
            });
        });
</script>