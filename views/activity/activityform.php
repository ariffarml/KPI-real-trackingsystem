<?php

use app\models\AddActivity;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use app\models\Kpi_Insert;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'Activity Form';
$this->params['breadcrumbs'][] = ['label' => 'KPI Form', 'url' => ['kpi/create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<!--TABLE KPI-->
<section id="section1">
        <br>
        <div class="table">
            <h3>KPI Table</h3>

            <?php
            $buttons = [
                'view' => function($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->kpi_id], ['class' => 'KPI_insertButton', 'value'=>$url]);
                },
                'update' => function($url, $model) {
                    //do some security check to make sure the data that the user delete is their data not others if can
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>',['kpi/view', 'id' => $model->kpi_id], $url);
                },
                'delete' => function($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this KPI?',
                            'method' => 'post',
                        ],
                    ]);
                },
            ];
        ?>
            
            <?php
            
            echo GridView::widget([
                'dataProvider' => $dataProvider,

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    /*[
                        'attribute' => 'kpi_year',
                        'label' => 'KPI Year',
                        'value' => 'kpi_year',
                    ], */

                    [
                        'attribute' => 'kpi_id',
                        'label' => 'KPI ID',
                        'value' => 'kpi_id',
                    ],

                    [
                        'attribute' => 'kpi_number',
                        'label' => 'KPI Number',
                        'value' => 'kpi_number',
                    ],

                    [
                        'attribute' => 'kpi_desc',
                        'label' => 'KPI Description',
                        'value' => 'kpi_desc',
                    ],

                    [
                        'attribute' => 'datetime',
                        'label' => 'Date',
                        'value' => 'datetime'
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                        'buttons' => [$buttons],
                    ],

                    ],
            ]);

            ?>

        </div>
        <br><br><br><br>

        </section>

<div class="activity-part">

    <!--back button-->
    <h1><?= Html::encode($this->title) ?></h1>
    <h1><progress value="50" max="100"></progress></h1>

    <div class= "d-flex justify-content-end">
        <ul class="nav nav-pills">
        <li><a href="#">Insert KPI</a></li>
        <li class="active"><a href="/views/activity/activityform.php">Add Activity</a></li>
        <li><a href="/views/subactivity/subactform.php">Add Subactivity</a></li>
        <li><a href="#">Update Progress</a></li>
        </ul>

        <!--<button type="button" class="btn btn-outline-info" a= "#">Insert KPI</button>
        <button type="button" class="btn btn-outline-info" a= "#">Add Activity</button>
        <button type="button" class="btn btn-outline-info" a= "#">Add Sub-activity</button>
        <button type="button" class="btn btn-outline-info" a= "#">Update Progress</button> -->
    </div>

    <div class= "container mt-3" style="border-style: solid; border-color:#E9F2FC">
        
        <br>
        <br> 

        <!-- THE ACTIVITY FORM -->
        <section id="section2">

        <div class="container-activity-form">

            <?php $form = ActiveForm::begin([
                        'enableAjaxValidation' => false,
                        //'validationOnChange' => true,
                        //'validationOnSubmit' => true,
                        'options' => [],
                    ]); ?>

                    <div class= "row" style="display: none">
                    <?= $form->field($model, 'datetime')->textInput(['disabled'=>true, 'value' => date(strtotime($model->datetime))])?>
                    </div>

                    <div class= "row">
                        <div class= "col-lg-3">
                            <?= $form->field($model, 'kpi_year')->dropDownList($kpiYear, ['prompt' => 'Select Year']) ?>
                        </div>


                        <div class = "col-lg-6">
                            <?= $form->field($model, 'KPI_id')->dropDownList($kpiList,[
                                'prompt' => "Select KPI's description ",
                                /*'id' => 'kpi-id' */]) ?>

                        </div>
                        
                    </div>

                    <div class= "row">
                        <div class = "col-lg-3">
                            <?= $form -> field($model, 'activity_number')->textInput()?>
                        </div>
                    </div>

                    <div class="row">
                        <div class = "col-lg-9">
                            <?= $form-> field($model, 'activity_desc')->textarea(['rows'=>5])?>

                        </div>

                    </div>

                    <br><br>
                    <div class= "row" style="display:none">
                    <div class="col-lg-6">
                        <?//= $form->field($model, 'kpi_year')->hiddenInput(['id' => 'kpiyear_hidden'])->label(false) ?>
                        <?//= $form->field($model, 'KPI_id')->hiddenInput(['id'=>'kpiid_hidden'])->label(false) ?>
                    </div>

            </div>

            </div>
            
                <?= Html::submitButton('Save', ['class'=>'btn btn-success']) ?>
                <br>
                <br>
                <br>
                <?php $form = ActiveForm::end(); ?>
                
                
            </div>
            <br><br><br><br><br>

        </div>
        
        </section>
            
<br>
<br>

<style>
    .fixed-right {
    position: fixed;
    right: 0;
    top: 0;
    height: 100%;
    z-index: 1030; /* Bootstrap's default navbar z-index */
    width: 200px; /* Adjust the width according to your needs */
}

.navbar-nav {
    flex-direction: column;
    height: 100%;
    justify-content: center;
}

.nav-link {
    text-align: right;
    padding-right: 15px;
}
</style>


    <!--<div class="col-lg-6">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-right">
--><!--<a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <!--<div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <div class= "row">
                    <li class="nav-item">
                        <a class="nav-link" href="#section1">Section 1</a>
                    </li>
                    </div>

                    <div class= "row">
                    <li class="nav-item">
                        <a class="nav-link" href="#section2">Section 2</a>
                    </li>

                    </div>

                    <div class= "row">
                    <li class="nav-item">
                        <a class="nav-link" href="#section3">Section 3</a>
                    </li>
                    </div>

                </ul>
            </div>
        </nav>
    </div> -->


<section id="section3"> <!--add subactivity-->

</section>

<?php
$this->registerJs("
$(document).ready(function(){
    $('a[href^=\"#\"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });
});
");
?>

<script>

    /*$('#kpi-id').change(function() {
                var kpiId = $(this).val();
                $.ajax({
                    url: 'index.php?r=activity%2Fget-year-by-kpi', // Adjust the route as needed
                    type: 'GET',
                    data: {id: kpiId},
                    success: function(data) {
                        if(data.error) {
                            console.error(data.error);
                        } else {
                        //$('#subactivity-id').val(data.subactivity-id); //from table subactivity
                        $('#kpiyear').val(data.kpiyear); //from table subactivity
                        //$('#activitydesc').val(data.activitydesc); //from table activity
                        //$('#subdesc').val(data.subdesc); //from table subactivity
                        //$('#kpiid').val(data.kpiid);
                        //$('#kpitarget').val(data.kpitarget);

                        //for hidden inputs
                        $('#kpiyear_hidden').val(data.kpiyear);
                        //$('#activitydesc_hidden').val(data.activitydesc);
                        //$('#subdesc_hidden').val(data.subdesc);
                        //$('#kpiid_hidden').val(data.kpiid);
                        //$('#kpitarget_hidden').val(data.kpitarget);
                    }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                    }
                });
            }); */
    /*
    $('#year-dropdown').change(function() {
        var selectedYear = $(this).val();
        if (selectedYear) {
            $.ajax({
                url: '',
                data: {kpi_year: selectedYear},
                success: function(data) {
                    var kpiList = JSON.parse(data);
                    var $kpiDropdown = $('#kpi-dropdown');
                    $kpiDropdown = $('#kpi-dropdown');
                    $kpiDropdown.empty();

                    $.each(kpiList, function (kpi_id, kpi_desc){
                        $kpiDropdown.append($('<option>', {
                            value: kpi_id,
                            text: kpi_desc
                        }));
                    });
                }
            });
        }
    }); */ 

</script>
