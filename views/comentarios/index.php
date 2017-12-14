<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\date\DatePicker;
use app\models\Evento;
use app\assets\ComentarioAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComentarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comentarios';
$this->params['breadcrumbs'][] = $this->title;
ComentarioAsset::register($this);
?>
<div class="comentario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Comentario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'resizableColumns' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Texto Comentario',
                'attribute' => 'texto_comentario',
                'group' => true,
                'width' => '110px',

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
                'label' => 'Usuarios',
                'attribute' => 'usuarios_id',
                'value' => 'usuarios.nombre',
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
                            'comentarios/view', 'id' => Html::encode($model->id),
                        ], [
                            'class' => 'btn btn-xs btn-info btnsAction'
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('Modificar', [
                            'comentarios/update', 'id' => Html::encode($model->id),
                        ], [
                            'class' => 'btn btn-xs btn-warning btnsAction'
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('Eliminar', [
                            'comentarios/delete', 'id' => Html::encode($model->id),
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
