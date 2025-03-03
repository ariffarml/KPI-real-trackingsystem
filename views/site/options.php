<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use app\models\KPIinsert;
use app\models\KPIDetail;

?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class= "button-options">
    <div class = "row">
        <div class= "col-md-6">
            <?= Html::img('@web/images/selection.jpeg', ['alt' => 'image', 'class'=>'custom-image'] ) ?>
        </div>
        <div class= "col-md-6">
            <?php
            //temporary
            echo "<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>";
            
            //insert KPI1
            echo Html::a('Insert KPI', ['kpi/create'], ['class' => 'btn btn-secondary btn-lg btn-dark']);
            echo "<br>";
            echo "<br>";
            //insert activity
            echo Html::a('Add Activity per KPI', ['activity/create'], ['class' => 'btn btn-secondary btn-lg btn-dark']);
            echo "<br>";
            echo "<br>";
            //insert subactivity
            echo Html::a('Add Subactivity per KPI', ['subactivity/show'], ['class' => 'btn btn-secondary btn-lg btn-dark']);
            echo "<br>";
            echo "<br>";
            //update progress
            echo Html::a('Update Progress',['update/view'], ['class' => 'btn btn-secondary btn-lg btn-dark']);
            echo "<br>";
            echo "<br>";
            ?>
        </div>
    </div>
</div>

<div class="row">
    <!--table-->
    <h3>KPI log table</h3>
    <br><br>
    <?php $form=ActiveForm::begin([
        'enableAjaxValidation' => false,
        'options' => [],
    ]); ?>
    
    <?= $form->field($searchModel, 'kpi_year')->DropDownList($kpiYear,['prompt' => 'Filter by Year'])?>
    
    <?php $form=ActiveForm::end(); ?>
    <br><br><br><br><br><br>

    <?php
    $buttons = [
        'view' => function($url, $model) {
            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#', ['class' => 'KPI_insertButton', 'value'=>$url]);
        },
        'update' => function($url, $model) {
            //do some security check to make sure the data that the user delete is their data not others if can
            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url);
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
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'detail_id',
                'label' => 'Detail ID',
                'value' => 'detail_id',
            ],
        
            [
                'attribute' => 'subactivity_id',
                'label' => 'Sub-activity ID',
                'value' => 'subactivity_id',
            ],

            [
                'attribute' => 'subactivity_desc',
                'label' => 'Sub-activity Description',
                'value' => 'subactivity_desc',
            ],

            [
                'attribute' => 'kpi_year',
                'label' => 'Year',
                'value' => 'kpi_year',
            ],

            [
                'attribute' => 'kpi_desc',
                'label' => 'KPI Description',
                'value' => 'kpi_desc',
            ],

            [
                'attribute' => 'activity_desc',
                'label' => 'Activity Description',
                'value' => 'activity_desc',
            ],

            [
                'attribute' => 'month',
                'label' => 'Month',
                'value' => 'month',
            ],

            [
                'attribute' => 'kpi_target',
                'label' => 'KPI Target',
                'value' => 'kpi_target',
            ],

            [
                'attribute' => 'progress',
                'label' => 'Progress',
                'value' => 'progress',
            ],

            [
                'attribute' => 'notes',
                'label' => 'Notes',
                'value' => 'notes',
            ],
            
            [
                'attribute' => 'datetime',
                'label' => 'Date and Time',
                'value' => 'update_date',
            ],

            [
                'class'=> 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [$buttons],
            ],

        ],
        ]);
    ?>

</div>