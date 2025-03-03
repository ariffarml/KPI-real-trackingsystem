<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
<!--this is starter page -->
<div class="site-index">
    <br><br><br>
    <div class="container mt-3" style="background:#FBEDEF">
    <!--<div style="width: 100%; height: 100%; position: relative">
        <div style="width: 60px; height: 335px; left: 0px; top: 60px; position: absolute; transform: rotate(-90deg); transform-origin: 0 0; background: #242424; box-shadow: 0px 10px 20px rgba(48, 48, 48, 0.25); border-radius: 8px"></div>
        <div style="left: 103px; top: 17px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: Nunito Sans; font-weight: 600; word-wrap: break-word">Start Tracking </div>
    </div> -->
    <br>
    <br>
    <h1 style= "text-align: center">SAD Key Performance Indicator (KPI) Tracker</h1>
    <div class= "btn justify-content-end">
    <?php
        echo Html::a('Start Tracking', url::to(['site/options']), ['class' => 'btn btn-secondary btn-lg btn-dark'])
    ?>
    </div>
    <!--<a type= "button" class= "btn btn-secondary btn-lg btn-dark" href="">Start Tracking</a> -->
    </div>
</div>



<?php

/** @var yii\web\View $this */

//$this->title = 'My Yii Application';
?>

<!--<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4 mb-3">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div> -->
