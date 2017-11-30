<?php

namespace app\controllers;

use Yii;
use app\models\Comentario;
use app\models\ComentarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComentariosController implementa las acciones CRUD para el modelo Comentario.
 */
class ComentariosController extends Controller
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
        ];
    }

    /**
     * Lista todos los comentarios.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComentarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra los datos de un comentario.
     * @param int $id El id del comentario que se quiere mostrar.
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo comentario.
     * Si el comentario se ha creado con exito, el navegador redireccionara a
     * la vista del comentario.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comentario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica los datos de un comentario existente.
     * Si la modificación se ha realizado con exito, el navegador redireccionara
     * a la vista del comentario modificado.
     * @param int $id El id del evento que se quiere modificar.
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Elimina un comentario existente.
     * Si se ha eliminado con exito, el navegador redireccionara a la pagina
     * indice de los comentarios.
     * @param int $id El id del comentario que se quiere eliminar.
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Encuentra un comentario buscando por su clave primaria(id).
     * Si el comentario no se enecuentra,se lanzara una excepcion 404 HTTP.
     * @param int $id El id del comentario que se quiere buscar.
     * @return Comentario El evento cargado.
     * @throws NotFoundHttpException Si el comentario no se ha encontrado.
     */
    protected function findModel($id)
    {
        if (($model = Comentario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
