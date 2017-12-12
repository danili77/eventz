<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = $model->nombre;
?>
<div class="evento-view">

    <h2>Evento: <?= Html::encode($model->nombre) ?></h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre',
            'descripcion:ntext',
            'fecha:date',
            'lugar',
            //'tipo_evento',
            //'usuarios_id',
        ],
    ]) ?>
</div>
