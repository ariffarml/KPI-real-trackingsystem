<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Kpi_Insert;
use yii\helpers\Url;
use dosamigos\multiselect\MultiSelect;
use kartik\select2\Select2;

$this->title = 'Subactivity Form';
$this->params['breadcrumbs'][] = ['label' => 'Activity Form', 'url' => ['activity/create']];
$this->params['breadcrumbs'][] = $this->title;

?>

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<!--SUBACTIVITY FORM-->
<div class = "subactivity">
    <h1><?= Html::encode($this->title) ?></h1>
    <h1><progress value ="70" max ="100" ></progress></h1>

    <div class= "d-flex justify-content-end">
        <ul class="nav nav-pills">
        <li><a href="#">Insert KPI</a></li>
        <li><a href="/views/activity/activityform.php">Add Activity</a></li>
        <li class="active"><a href="/subactivity/show">Add Subactivity</a></li>
        <li class= "disabled"><a href="#">Update Progress</a></li>
        </ul>

    </div>

    <div class= "container mt-3" style="border-style: solid; border-color:#E9F2FC">
        <br>
        <br>

        <section id = "section3">

        <div class= "container-subactivity-form">
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
                            <?= $form->field($model, 'kpi_year')->dropDownList($kpiYear, ['prompt' => 'Select Year']) ?> <!--do based on year exist in table db kpi insert-->
                        </div>
                        <div class= "col-lg-6">
                            <?= $form->field($model, 'activity_id')->dropDownList($actDesc, ['prompt'=>"Select KPI's activity"])?> <!--will drag list activity hold by activity id-->
                        </div>
                        
                    </div>

                    <div class= "row">
                        <div class = "col-lg-3">
                            <?= $form -> field($model, 'subactivity_number')->textInput()?>
                        </div>
                    </div>

                    <div class="row">
                        <div class = "col-lg-9">
                            <?= $form-> field($model, 'subactivity_desc')->textarea(['rows'=>5])?>

                        </div>

                    </div>
                    <div class = "row">
                        <div class= "col-lg-3">
                            <?= $form->field($model, 'KPI_target')->textInput()?>
                        </div>
                    </div>

                    <div class = "row">
                        <div class= "col-lg-6">
                            <div>

                                <?php
                                echo "<b>PIC</b>";
                                echo Select2::widget([
                                    'model' => $model,
                                    'name' => 'PIC',
                                    'attribute' => 'PIC',
                                    'data' => $list,
                                    'options' => [
                                        'name' => 'PIC',
                                        'placeholder' => 'Select Officers',
                                        'multiple' => true,
                                    ],
                                    'pluginOptions' =>[
                                        'allowClear' => true,

                                    ],

                                    ]); ?>

                            </div>
                        </div>

                    </div>

                    <br><br>

            </div>
            
                <?= Html::submitButton('Save', ['class'=>'btn btn-success']) ?>
                <br>
                <br>
                <br>
                <?php $form = ActiveForm::end(); ?>


        </div>

        </section>

    </div>

</div>