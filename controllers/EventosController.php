<?php

namespace app\controllers;

use Yii;
use app\models\Evento;
use app\models\Comentario;
use app\models\EventoSearch;
use app\models\TipoEvento;
use app\models\Usuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use mPDF;


/**
* EventosController implementa las acciones CRUD para el modelo de Evento.
*/
class EventosController extends Controller
{
  /**
   * Devuelve un listado con los comportamientos del componente.
   * @return mixed
   */
   public function behaviors()
     {
         return [
             'verbs' => [
                 'class' => VerbFilter::className(),
                 'actions' => [
                     'delete' => ['POST'],
                 ],
             ],
             'access' => [
                 'class' => AccessControl::className(),
                 'rules' => [
                     [
                         'allow' => true,
                         'actions' => ['index','view','calendario','gen-pdf'],
                         'roles' => ['?'],
                     ],
                     [
                         'allow' => true,
                         'actions' => ['index','create','view', 'update', 'delete','calendario','gen-pdf','create-calendario'],
                         'roles' => ['@'],
                     ],
                 ],
             ],
         ];
     }

  /**
  * Lista todos los eventos.
  * @return mixed
  */
  public function actionIndex()
  {
    $tipos = TipoEvento::find()->select('tipo, id')->orderBy('tipo')->indexBy('id')->column();
    $usuarios = Usuario::find('id=$model->id')->select('nombre, id')->orderBy('nombre')->indexBy('id')->column();

    $searchModel = new EventoSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'tipos' => $tipos,
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
      'usuarios' => $usuarios,
    ]);
  }

/**
 * Crea un Calendario donde los eventos estan marcados.
 * @return void
 */
  public function actionCalendario()
  {
    $events = Evento::find()->all();

    $tasks = [];
    foreach ($events as $eve)
    {
      $event = new \yii2fullcalendar\models\Event();
      $event->id = $eve->id;
      $event->title = $eve->nombre;
      $event->start = $eve->fecha;
      $tasks[] = $event;
    }

    $searchModel = new EventoSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('calendario', [
      'events' => $tasks,
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
  * Muestra los datos de un solo evento.
  * @param integer $id El id del evento que se quiere mostrar.
  * @return mixed
  */
  public function actionView($id)
  {
    $comentarioNuevo = new Comentario(['eventos_id' => $id]);

    if ($comentarioNuevo->load(Yii::$app->request->post())) {
      $comentarioNuevo->usuarios_id = Yii::$app->user->id;
      $comentarioNuevo->eventos_id = $id;
      if ($comentarioNuevo->save()) {
        return $this->redirect(['../eventos/view', 'id' => $id]);
      }
    }


    $comentarios = Comentario::findAll(['eventos_id' => $id]);
    $numComentarios = count($comentarios);

    return $this->render('view', [
      'model' => $this->findModel($id),
      'comentarios' => $comentarios,
      'numComentarios' => $numComentarios,
      'comentarioNuevo' => $comentarioNuevo,
    ]);
  }

  /**
  * Crea un nuevo evento.
  * Si el evento se ha creado con exito, el navegador se redireccionara a la vista del evento.
  * @return mixed
  */
  public function actionCreate()
  {
    $model = new Evento();
    //  $model->fecha = $date;


    if ($model->load(Yii::$app->request->post())) {
      $model->usuarios_id = Yii::$app->user->id;
      if ($model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
      }
    } else {
      $tipos = TipoEvento::find()->select('tipo, id')->orderBy('tipo')->indexBy('id')->column();
      $usuarios = Usuario::find('id=$model->id')->select('nombre, id')->orderBy('nombre')->indexBy('id')->column();
      return $this->render('create', [
        'model' => $model,
        'tipos' => $tipos,
      ]);
    }
  }

/**
 * Crea un nuevo evento en el calendario y en la tabla eventos
 * @return [type] [description]
 */
  public function actionCreateCalendario()
  {
    $model = new Evento();
    //  $model->fecha = $date;


    if ($model->load(Yii::$app->request->post())) {
      $model->usuarios_id = Yii::$app->user->id;
      if ($model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
      }
    } else {
      $tipos = TipoEvento::find()->select('tipo, id')->orderBy('tipo')->indexBy('id')->column();
      $usuario = Yii::$app->user;
      return $this->renderAjax('create-calendario', [
        'model' => $model,
        'tipos' => $tipos,
        //'usuarios' =>$usuarios,
        'usuario' =>$usuario
      ]);
    }
  }


  /**
  * Modifica los datos de un evento existente.
  * Si la modificación se a realizado con exito, el navegador se redireccionará
  * a la vista del evento modificado.
  * @param int $id El id del evento que se quiere modificar.
  * @return mixed
  */
  public function actionUpdate($id)
  {

    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      $tipos = TipoEvento::find()->select('tipo, id')->orderBy('tipo')->indexBy('id')->column();
      return $this->render('update', [
        'model' => $model,
        'tipos' => $tipos,

      ]);
    }
  }

  /**
  * Elimina un evento existente.
  * Si se ha borrado con exito, el navegador se redireccionara a la pagina
  * indice de los eventos.
  * @param int $id El id del evento que se quiere eliminar.
  * @return mixed
  */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Crea y descarga un documento pdf con el evento indicado.
   * @param int $id El id del evento.
   * @return void
   */
  public function actionGenPdf($id)
  {
    $pdf_contenido = $this->renderPartial('view-pdf',[
      'model' => $this->findModel($id),
    ]);

    $mpdf = new \Mpdf\Mpdf();
    $css = file_get_contents(Yii::getAlias('@app/web/css/pdf.css'));
    $mpdf->WriteHTML($css, 1);
    $mpdf->writeHTML("<h1><img src='../web/imagenes/logoPdf.png'>Eventz</h1>");
    $mpdf->writeHTML($pdf_contenido);
    $mpdf->OutPut();
    exit;
  }

  /**
  * Encuentra un evento buscando por su clave primaria(id).
  * Si el evento no se enecuentra,se lanzara una excepción 404 HTTP.
  * @param int $id El id del evento que se quiere buscar.
  * @return Evento El evento cargado
  * @throws NotFoundHttpException Si el evento no se ha encontrado
  */
  protected function findModel($id)
  {
    if (($model = Evento::findOne($id)) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('La pagina solicitada no existe.');
    }
  }
}
