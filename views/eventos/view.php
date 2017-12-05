<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-view">

    <h2>Evento: <?= Html::encode($model->nombre) ?></h2>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro que desea eliminar este evento?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Pasar a PDF', ['gen-pdf','id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre',
            'descripcion:ntext',
            'fecha:datetime',
            'lugar',
            'tipoEvento.tipo',
            'usuarios.nombre',
        ],
    ]) ?>

    <h2>Comentarios (<?= $numComentarios; ?>)</h2><br><br>
    <!-- Html::a('Profile', ['user/view', 'id' => $id], ['class' => 'profile-link'])  -->
    <?= Html::a(
      'Comentar',
      ['../comentarios/create', 'id' => $model->id],
      ['class' => 'btn btn-success']
    ); ?><br><br>
    <?php foreach ($comentarios as $comentario) {?>
      <div class="bg-info">

        <p><?= $comentario->texto_comentario ?></p>
        <p>Fecha comentario:<?= Yii::$app->formatter->asDate($comentario->fecha, 'php:d-m-Y');?></p>
        <?= Html::a('Ver', ['/comentarios/view', 'id' => $comentario->id], ['class' => 'btn btn-xs btn-info btnsAction']) ?>
        <?= Html::a('Modificar', ['/comentarios/update', 'id' => $comentario->id], ['class' => 'btn btn-xs btn-warning']) ?>
        <?= Html::a('Eliminar', ['/comentarios/delete', 'id' => $comentario->id], [
          'class' => 'btn btn-xs btn-danger',
          'data' => [
            'confirm' => '¿Esta seguro que desea eliminar este evento?',
            'method' => 'post',
          ],
          ]) ?>
        </div><br>


      <?php } ?>
      <hr>
      <br><br>

</div>
