<?php

use yii\helpers\Html;
use app\assets\EventoAsset;


/* @var $this yii\web\View */
/* @var $model app\models\Evento */


EventoAsset::register($this);

$this->title = 'Crear Evento';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'tipos' => $tipos,
    ]) ?>

</div>
