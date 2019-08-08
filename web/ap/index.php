<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;

use yii\grid\GridView;
use yii\widgets\Pjax;

$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'pertanyaan',
            'jenis:ntext',

           ['class' => 'yii\grid\ActionColumn', 'options' => [
            'width' => '120px',
        ],
        'contentOptions' => ['class' => 'td-actions text-right'],
        'headerOptions' => ['class' => 'text-right'],
           'template' => Mimin::filterActionColumn([
              'update', 'delete', 'view', ],$this->context->route)],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\PertanyaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pertanyaan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pertanyaan-index">

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body text-left">
              <?= Html::a('<i class="material-icons">add</i>' . Yii::t('app', 'Pertanyaan Baru'), ['create'], ['class' => 'btn btn-success']) ?>            </div>
        </div>
    </div>
     <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">calendar_today</i>
                </div>
                <h4 class="card-title"><?= $this->title ?> </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">






    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        
    ]);
 ?>

</div>
            </div>
        </div>
    </div>
</div>

    <?php Pjax::end(); ?>
</div>
