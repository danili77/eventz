<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use app\models\Evento;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-index">

    <h2>Calendario de <?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        Modal::begin([
            'header' =>'<h4>Evento</h4>',
            'id' => 'modal',
            'size' =>'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>

    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
  ));?>
</div>
