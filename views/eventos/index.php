<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\IndexAsset;
use app\models\Evento;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
IndexAsset::register($this);

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
        <?= Html::a('Calendario', ['/eventos/calendario'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Convertir a PDF', ['create'], ['class' => 'btn btn-success']) ?>
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
    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
  ));?>
</div>
