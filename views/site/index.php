<?php

use yii\helpers\Html;
use hscstudio\mimin\components\Mimin;

// $this->registerCSSFile('css/metro-all.css');
// $this->registerCSSFile('css/start.css');
// $this->registerJSFile(Yii::$app->homeUrl.'js/metro.min.js', ['depends' => [yii\web\JqueryAsset::className()]]);
// $this->registerJSFile(Yii::$app->homeUrl.'js/start.js', ['depends' => [yii\web\JqueryAsset::className()]]);
/* @var $this yii\web\View */
/* @var $this yii\web\View */

?>
<div class="row">
   <div class="col-md-12">
      <div class="x_panel">
         <div class="x_title">
            <h2>Selamat Datang</h2>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            <?php
            if (Yii::$app->user->identity->jenis_user === 'camaba') {
               echo $this->render('dashboard_camaba');
            } else {
               echo $this->render('dashboard');
               
            }



            ?>


         </div>








      </div>


   </div>


</div>