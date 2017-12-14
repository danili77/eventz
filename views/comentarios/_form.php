<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Comentario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'texto_comentario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'fecha')->widget(DatePicker::className(),[
      'dateFormat' => 'dd-MM-yyyy',
      'language' =>'es',
    ]) ?>

    <?= $form->field($model, 'eventos_id')->textInput()->dropDownList($eventos) ?>

    <?= $form->field($model, 'usuarios_id')->textInput(['readonly' => true])->dropDownList($usuarios) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(
          'Cancelar',
          ['../comentarios/index'],
          ['class' => 'btn btn-danger']
        ); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
