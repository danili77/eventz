<?php

use yii\helpers\Html;
use app\assets\EventoAsset;
use app\models\Evento;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

EventoAsset::register($this);

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        Modal::begin([
          'header' =>'<h4>Event</h4>',
          'id' =>'modal',
          'size'=>'modal-lg'
        ]);
        echo "<div id ='modalContent'></div>";
        Modal::end();
     ?>

    <p>
        <?= Html::a('Crear Evento', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Calendario', ['calendario'], ['class' => 'btn btn-success']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'resizableColumns' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Nombre',
                'attribute' => 'nombre',
                'group' => true,
                'width' => '110px',

            ],
            [
                'attribute' => 'descripcion',
            ],
            [
                'label' => 'Fecha',
                'value' => 'fecha',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                    ],
                    'readonly' => true,
                ]),
                'attribute' => 'fecha',
                'format' => 'date',
                'width' => '100px',
            ],
            [
                'attribute' => 'lugar',
            ],
            [
                'label' => 'Tipo',
                'attribute' => 'tipo_evento',
                'group' => true,
                'width' => '150px',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => $tipos,
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Tipos'],
            ],

            [
                'label' => 'Usuarios',
                'attribute' => 'usuarios_id',
                'group' => true,
                'width' => '110px',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => $usuarios,
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Usuarios'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('Ver', [
                            'eventos/view', 'id' => Html::encode($model->id),
                        ], [
                            'class' => 'btn btn-xs btn-info btnsAction'
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('Modificar', [
                            'eventos/update', 'id' => Html::encode($model->id),
                        ], [
                            'class' => 'btn btn-xs btn-warning btnsAction'
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('Eliminar', [
                            'eventos/delete', 'id' => Html::encode($model->id),
                        ], [
                            'class' => 'btn btn-xs btn-danger btnsAction',
                            'data' => [
                                'confirm' => '¿Estás seguro de eliminar este evento?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
        'responsive'=>true,
        'hover'=>true,
    ]); ?>


</div>
