<?php 

use yii\helpers\Html;

?>
<div class="x_panel">
    <div class="x_title">
        <h2><?= Yii::$app->user->identity->username . '-' . Yii::$app->user->identity->model->nama; ?></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>


        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="product-image1">
                <img src="http://ukt.uinsby.ac.id/assets/foto/<?= Yii::$app->user->identity->model->foto ?>" alt=" ..." height="521" width="370" class="img-circle">
            </div>

           

        </div>
        <div class="col-md-8 col-sm-8 col-xs-12" style="border:0px solid #e5e5e5;">
        <div class="alert alert-info">
    <h4>Selamat datang !</h4>
    <!-- <b>BIDIKMISI</b> adalah bantuan biaya pendidikan yang hanya ditujukan untuk calon mahasiswa tidak mampu (miskin) -->

    <b>BIDIKMISI</b> adalah bantuan biaya pendidikan bagi calon mahasiswa tidak mampu secara ekonomi dan memiliki potensi akademik baik untuk menempuh pendidikan di perguruan tinggi pada program studi unggulan sampai lulus tepat waktu.

</div>
<h3 class="prod_title">Data Calon Mahasiswa</h3>
 <h2><?=Yii::$app->user->identity->model->nama;?></h2>
<h3>

<article class="media event"><i class="fa fa-id-card"></i> No. Pendaftaran: <?= Yii::$app->user->identity->model->kode?> </article>
<article class="media event"><i class="fa fa-calendar"></i> Tahun Masuk: <?=date("Y")?> </article>
<article class="media event"><i class="fa fa-building"></i> Program Studi: <?=Yii::$app->user->identity->model->nama_prodi?> </article>
<article class="media event"><i class="fa fa-home"></i> Alamat: <?=Yii::$app->user->identity->model->alamat?>  <?=Yii::$app->user->identity->model->nama_kabupaten?> <?=Yii::$app->user->identity->model->nama_provinsi?></article>
<article class="media event"><?=html::a("Pengajuan Bidikmisi",["/"],["class"=>'btn btn-success btn-round']) ?></article>
</h3>  


        </div>


    </div>
</div>