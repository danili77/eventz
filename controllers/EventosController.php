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
use kartik\mpdf\Pdf;
use yii\helpers\ArrayHelper;


/**
* EventosController implements the CRUD actions for Evento model.
*/
class EventosController extends Controller
{
  /**
  * @inheritdoc
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
    ];
  }

  /**
  * Lists all Evento models.
  * @return mixed
  */
  public function actionIndex()
  {
    $tipos = TipoEvento::find()->select('tipo, id')->orderBy('tipo')->indexBy('id')->column();
    $usuarios = Usuario::find()->asArray()->all();
    $usuarios = ArrayHelper::map($usuarios, 'id', 'id');

    $searchModel = new EventoSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'tipos' => $tipos,
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
      'usuarios' => $usuarios
    ]);
  }

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
  * Displays a single Evento model.
  * @param integer $id
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
  * Creates a new Evento model.
  * If creation is successful, the browser will be redirected to the 'view' page.
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
          //$usuarios = Usuario::find('id=$model->id')->select('nombre, id')->orderBy('nombre')->indexBy('id')->column();
          return $this->render('create', [
                  'model' => $model,
                  'tipos' => $tipos,
                  //'usuarios' =>$usuarios,
              ]);
      }
    }


  /**
  * Updates an existing Evento model.
  * If update is successful, the browser will be redirected to the 'view' page.
  * @param integer $id
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
  * Deletes an existing Evento model.
  * If deletion is successful, the browser will be redirected to the 'index' page.
  * @param integer $id
  * @return mixed
  */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
  * Finds the Evento model based on its primary key value.
  * If the model is not found, a 404 HTTP exception will be thrown.
  * @param integer $id
  * @return Evento the loaded model
  * @throws NotFoundHttpException if the model cannot be found
  */
  protected function findModel($id)
  {
    if (($model = Evento::findOne($id)) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }
}
