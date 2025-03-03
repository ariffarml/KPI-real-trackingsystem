<?php 

//use Yii;

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Monthly KPI's Activities Progress";
$this->params['breadcrumbs'][] = $this->title;


?>

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<div class= "update-table-progress">

<h1><?= Html::encode($this->title)?></h1>

<div class= "row">
    <div class = "col-md-12 d-flex justify-content-end align-items-end">
        <br>
        <br>
        <br>
        <?php //update progress
        echo Html::a('Update Progress',["update/create"], ['class' => 'btn btn-secondary btn-lg btn-dark']);
        echo "<br>";
        echo "<br>";
            
        ?>

    </div>

    <div class = "table-progress">
        <!--join the table month and table update progress -->
        <?/*php

        echo GridView::widget([
            'dataProviderUpdateTable' => $dataProviderUpdateTable,
            'filterModel' => $searchModel,

            'columns' => [
                [
                    'attribute' => 'Month',
                    'value' => 'Kpi_month.month',
                    'label' => 'Month Table'

                ],
            ]
        ]) */
        
        ?> 

    </div>

</div>

</div>

