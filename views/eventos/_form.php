<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

use app\models\TipoEvento;

/* @var $this yii\web\View */
/* @var $modl app\models\Evento */
/* @var $form yii\widgets\ActiveForm */


$tipos = TipoEvento::find()->select('tipo, id')->orderBy('tipo')->indexBy('id')->column();
?>

<div class="evento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model,'fecha')->widget(DatePicker::className(),[
      'dateFormat' => 'dd-MM-yyyy',
      'language' =>'es',
    ]) ?>

    <?= $form->field($model, 'lugar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_evento')->textInput()->dropDownList($tipos) ?>

    <?= $form->field($model, 'usuarios_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
