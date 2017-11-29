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

    <?= $form->field($model, 'eventos_id')->textInput() ?>

    <?= $form->field($model, 'usuarios_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>