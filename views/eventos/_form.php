<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use \app\models\TipoEvento;
use yii\helpers\Url;
use yii\web\View;
use yii\web\JqueryAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */
/* @var $form yii\widgets\ActiveForm */

?>

<?php
//$urlProvincia = Url::to(['provincias/provincias']);
//$urlPoblacion = Url::to(['poblacion/poblacion']);
//$provincia = $model->provincia;
//$poblacion = $model->poblacion;

//$js = <<<EOT
//var urlProvincia = "$urlProvincia";
//var urlPoblacion = "$urlPoblacion";

//EOT;
//$this->registerJs($js);
//$this->registerJsFile(
//    '/js/ajaxEventos.js',
//    ['depends' => [JqueryAsset::className()]]
//);
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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
         ?>
         <?= Html::a(
           'Cancelar',
           ['../eventos/index'],
           ['class' => 'btn btn-danger']
         ); ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
