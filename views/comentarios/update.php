<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comentario */

$this->title = 'Modificar Comentario: ' . $model->texto_comentario;
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comentario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'usuarios' =>$usuarios,
        'eventos' =>$eventos,
    ]) ?>

</div>
