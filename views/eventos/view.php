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

  <h1>Evento: <?= Html::encode($this->title) ?></h1>

  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'nombre',
      'descripcion',
      'fecha:datetime',
      'lugar',
      'tipo_evento',
      'usuarios_id'
    ],
    ]) ?>
    <hr>
    <h3>Comentarios (<?= $numComentarios; ?>)</h3><br><br>
    <!-- Html::a('Profile', ['user/view', 'id' => $id], ['class' => 'profile-link'])  -->
    <?= Html::a(
      'Comentar',
      ['../comentarios/create', 'id' => $model->id],
      ['class' => 'btn btn-success']
    ); ?>
    <?php foreach ($comentarios as $comentario) {?>
      <div class="bg-info">

        <p><?= $comentario->texto_comentario ?></p>
        <p>Autor del comentario:<?= $comentario->usuarios_id ?></p>
        <p>Fecha comentario:<?= Yii::$app->formatter->asDate($comentario->fecha, 'php:d-m-Y');?></p>
        <?= Html::a('Ver', ['/comentarios/view', 'id' => $comentario->id], ['class' => 'btn btn-xs btn-info btnsAction']) ?>
        <?= Html::a('Modificar', ['/comentarios/update', 'id' => $comentario->id], ['class' => 'btn btn-xs btn-warning']) ?>
        <?= Html::a('Eliminar', ['/comentarios/delete', 'id' => $comentario->id], [
          'class' => 'btn btn-xs btn-danger',
          'data' => [
            'confirm' => '¿Esta seguro que desea eliminar este evento?',
            'method' => 'post',
          ],
          ]) ?><br><br>
        </div><br>


      <?php } ?>
      <hr>
      <br><br>
    </div>
