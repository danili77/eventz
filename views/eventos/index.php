<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\EventoAsset;

EventoAsset::register($this);


/* @var $this yii\web\View */
/* @var $searchModel app\models\EventosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
$eventos = $model;
?>
<div class="evento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Evento', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Calendario', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Convertir a pdf', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php foreach ($eventos as $evento) {?>

                      <h3> <?= $evento->nombre ?></h3>
                      <p><?= $evento->descripcion ?></p>

                    <?= Html::a('Ver', ['view', 'id' => $evento->id], ['class' => 'btn btn-xs btn-info btnsAction']) ?>
                    <?= Html::a('Modificar', ['update', 'id' => $evento->id], ['class' => 'btn btn-xs btn-warning']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $evento->id], [
                        'class' => 'btn btn-xs btn-danger',
                        'data' => [
                            'confirm' => '¿Esta seguro que desea eliminar este evento?',
                            'method' => 'post',
                        ],
                    ]) ?><br><br>


                        Subido por :<?= $evento->usuarios_id ?> |
                        Tipo:<?= $evento->tipo_evento ?> |
                        Fecha:<?= Yii::$app->formatter->asDate($evento->fecha, 'php:d-m-Y'); ?><br>

                        <a href="../eventos/<?= $evento->id?>">Comentarios (<?= $evento->cuantosComentarios($evento->id); ?>)</a>



    <?php } ?>




</div>
