<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Usuario;

/* @var $this yii\web\View */
/* @var $model app\models\Comentario */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentario-view">

    <h1>Comentario: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro que quiere eliminar este comentario?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'texto_comentario',
            'fecha:datetime',
            'eventos.nombre',
            'usuarios.nombre',
        ],
    ]) ?>

</div>
