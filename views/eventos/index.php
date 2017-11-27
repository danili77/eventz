<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\EventoAsset;
use app\assets\AppAsset;
use app\models\Evento;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//EventoAsset::register($this);
AppAsset::register($this);

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        Modal::begin([
          'header' =>'<h4>Event</h4>',
          'id' =>'modal',
          'size'=>'modal-lg'
        ]);
        echo "<div id ='modalContent'></div>";
        Modal::end();
     ?>

    <p>
        <?= Html::a('Crear Evento', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Calendario', ['calendario'], ['class' => 'btn btn-success']) ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'descripcion:ntext',
            'fecha:datetime',
            'lugar',
            //'tipo_evento',
            //'usuarios_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
