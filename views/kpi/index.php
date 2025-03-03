<?php

use app\models\InsertKpi;
use app\models\Kpi_Insert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

//Index- to show back

$this->title = 'KPI List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insert-kpi-index">

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <br><br><br>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Insert Kpi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kpi_id',
            'kpi_number',
            'kpi_desc',
            'kpi_year',
            //'datetime',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Kpi_Insert $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kpi_id' => $model->kpi_id]);
                 }
            ],
        ],
    ]); ?>


</div>