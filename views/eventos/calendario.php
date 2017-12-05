<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use app\models\Evento;
use yii\helpers\Url;
use app\assets\EventoAsset;


/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

EventoAsset::register($this);
$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;

$url = Url::to(['eventos/create-calendario']);
$js = <<<EOT
$(document).on('click','.fc-day',function() {
    var date=$(this).attr('data-date');

    $.get('$url', {'date': date}, function(data) {
        $('#modal').modal('show')
        .find('#modalContent')
        .html(data);
    });
});
EOT;
$this->registerJs($js);
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
  <?= Html::a(
    'Volver',
    ['../eventos/index'],
    ['class' => 'btn btn-success btnVolver']
  ); ?>
</div>
