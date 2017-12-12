<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\UsuarioAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
UsuarioAsset::register($this);
?>
<div class="usuario-view">

    <h2>Usuario: <?= Html::encode($model->nombre) ?></h2>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'nombre',
            'email',
            'created_at:date'
        ],
    ]) ?>

    <?= Html::a(
      'Volver',
      ['../site/index'],
      ['class' => 'btn btn-success btnVolver']
    ); ?>

</div>
