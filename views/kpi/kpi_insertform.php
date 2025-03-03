<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Kpi_Insert;
use yii\helpers\Url;


$this->title = 'KPI Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> -->

<!--<input type="text" id="datepicker" /> -->

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" > -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">  -->

<div class="kpi-insertform">
    <br><br><br>
    <!--back button-->
    
    <h1><?= Html::encode($this->title) ?></h1>
    <h1><progress value="26" max="100"></progress></h1>

    <div class= "d-flex justify-content-end">
        <ul class="nav nav-pills">
        <li class="active"><a href="#">Insert KPI</a></li>
        <li><a href="#">Add Activity</a></li>
        <li><a href="#">Add Subactivity</a></li>
        <li><a href="#">Update Progress</a></li>
        </ul>

        <!--<button type="button" class="btn btn-outline-info" a= "#">Insert KPI</button>
        <button type="button" class="btn btn-outline-info" a= "#">Add Activity</button>
        <button type="button" class="btn btn-outline-info" a= "#">Add Sub-activity</button>
        <button type="button" class="btn btn-outline-info" a= "#">Update Progress</button> -->
    </div>

    <div class= "container mt-3" style="border-style: solid; border-color:#E9F2FC">
        
            <?php $form = ActiveForm::begin([
                'enableAjaxValidation' => false,
                'options' => [],
            ]); ?>
            <br>

            <div class= "row" style="display: none">
            <?= $form->field($model, 'datetime')->textInput(['disabled'=>true, 'value' => date(strtotime($model->datetime))])?>
            </div>

            <div class= "row">
                <div class="col-lg-3">
                    <!--if you can, make bootstrap to choose year-->
                    <?php
                    $year= range(date('Y') - 100, date('Y') + 1000);
                    ?>
                    <?= $form->field($model, 'kpi_year')->dropDownList(array_combine($year,$year), ['prompt'=>'Select year'])?>
                
                </div>
                
                <div class= "col-lg-3">
                <?= $form->field($model, 'kpi_number')->textInput() ?>
                </div>

            </div>

            <div class= "row">
                <div class = "col-lg-9">
                <?= $form-> field($model, 'kpi_desc')->textarea(['rows'=> 5])?>
                </div>
            </div>

            <br>
            <br>
            <?= Html::submitButton('Save', ['class'=>'btn btn-success']) ?>
            
            <?php ActiveForm::end(); ?>
             
        
        <br><br><br><br>

    </div>
    
</div>
<Br><br><br>

    <script>
        $('.date-own').datepicker({
        minViewMode: 2,
        format: 'yyyy'
        });

    </script>

                
                